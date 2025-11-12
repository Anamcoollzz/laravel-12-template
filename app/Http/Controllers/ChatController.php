<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrudExampleRequest;
use App\Imports\CrudExampleImport;
use App\Models\ChatMessage;
use App\Models\CrudExample;
use App\Models\User;
use App\Repositories\CrudExampleRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ChatController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->icon       = 'fa fa-message';
        // $this->repository = new ChatRepository;
        $this->prefix     = $this->viewFolder            = 'chats';
        $this->pdfPaperSize = 'A2';
        $this->isCrud     = true;
        // $this->import     = new CrudExampleImport;

        // $this->defaultMiddleware($this->title = 'Chat');
    }

    /**
     * prepare store data
     *
     * @return array
     */
    protected function getStoreData()
    {
        $request = request();
        $data = request()->only([
            'text',
            'email',
            "number",
            "select",
            "textarea",
            "radio",
            "date",
            'checkbox',
            'checkbox2',
            "time",
            'tags',
            "color",
            'select2',
            'select2_multiple',
            'summernote',
            'summernote_simple',
            'barcode',
            'qr_code',
            'name',
            'phone_number',
            'birthdate',
            'address',

            //columns
        ]);

        $data['currency']     = idr_to_double($request->currency);
        $data['currency_idr'] = rp_to_double($request->currency_idr);

        if ($request->hasFile('file'))
            $data['file'] = $this->fileService->uploadCrudExampleFile($request->file('file'));

        if ($request->hasFile('image'))
            $data['image'] = $this->fileService->uploadCrudExampleFile($request->file('image'));

        if ($request->hasFile('avatar'))
            $data['avatar'] = $this->fileService->uploadCrudExampleFile($request->file('avatar'));

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        return $data;
    }

    /**
     * showing data page
     *
     * @param Request $request
     * @param string|null $category
     * @return Response
     */
    public function index(Request $request, $category = null)
    {
        $isSuperAdmin = is_superadmin();
        if ($request->ajax()) {
            $category = $request->category ?? null;
            if ($isSuperAdmin) {
                $to_user_id = User::where('uuid', $request->uuid)->value('id');
                return [
                    'status' => 'success',
                    'data' => ChatMessage::with(['toUser:id,avatar,name', 'fromUser:id,avatar,name'])
                        ->where(function ($query) use ($request, $to_user_id) {
                            $query->where(function ($query) use ($request, $to_user_id) {
                                $query->where('from_user_id', 1)
                                    ->where('to_user_id', $to_user_id);
                            })
                                ->orWhere(function ($query) use ($request, $to_user_id) {
                                    $query->where('from_user_id', $to_user_id)
                                        ->where('to_user_id', 1);
                                });
                        })
                        ->where('category', $category)
                        ->oldest('id')
                        ->oldest('created_at')
                        ->get(),
                ];
            } else {
                return [
                    'status' => 'success',
                    'data' => $this->getChat($request, $category),
                ];
            }
        }
        if (is_user()) {
            User::where('id', auth_user()->id)->update(['last_seen_at' => now()]);
        }
        $roomId = md5('1_' . auth_user()->id);
        $users = $isSuperAdmin ? User::select(['id', 'name', 'avatar', 'last_seen_at', 'is_anonymous', 'uuid'])->role('user')->latest('last_seen_at')->get() : [];
        // return $users;
        return view('stisla.chats.index', [
            'title'          => 'Chat',
            'users'          => $users,
            '_is_superadmin' => $isSuperAdmin ?? 0,
            'roomId'         => $isSuperAdmin ? null : $roomId,
            'category'       => $category
        ]);
        return $this->prepareIndex($request, ['data' => $this->getIndexData()]);
    }

    /**
     * get chat messages
     *
     * @param Request $request
     * @param string $category
     * @param bool|null $isCountOnly
     * @return Collection|int
     */
    private function getChat($request, $category, ?bool $isCountOnly = false)
    {
        $query = ChatMessage::with(['toUser:id,avatar,name', 'fromUser:id,avatar,name'])
            ->whereNull('deleted_at')
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('from_user_id', auth_id())
                        ->where('to_user_id', 1);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('from_user_id', 1)
                            ->where('to_user_id', auth_id());
                    });
            })
            ->oldest('id')
            ->oldest('created_at')
            ->where('category', $category);
        $isCountOnly = $isCountOnly ?? false;
        if ($isCountOnly) {
            return $query->count();
        }
        return $query->get();
    }

    /**
     * get users list for chat
     *
     * @return JsonResponse
     */
    public function users()
    {
        $users = is_superadmin() ? User::select(['id', 'name', 'avatar', 'last_seen_at', 'is_anonymous', 'uuid'])->role('user')->latest('last_seen_at')->get() : [];
        return response()->json([
            'status' => 'success',
            'data'   => $users,
        ]);
    }

    /**
     * get data for index page
     *
     * @return Collection|null
     */
    public function getIndexData()
    {
        return $this->repository->getFullDataWith(
            [
                'createdBy',
                'lastUpdatedBy',
            ],
            where: [],
            whereHas: []
        );
    }

    /**
     * showing add new data page
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return $this->prepareCreateForm($request);
    }

    /**
     * save new data to db
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $isSuperAdmin = auth_user()->hasRole('superadmin');
        $file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file')->store('public/chat-files');
        }
        if ($isSuperAdmin) {
            $to_user_id = $request->to_user_id;
            if ($request->uuid) {
                $user = User::where('uuid', $request->uuid)->first();
                $to_user_id = $user ? $user->id : null;
            }
            $store = ChatMessage::create([
                'from_user_id' => auth_user()->id,
                'to_user_id'   => $to_user_id,
                'message'      => $request->message,
                'category'     => $request->category,
                'file_path'    => $file,
            ]);
        } else {
            $count = $this->getChat($request, $request->category, isCountOnly: true);
            $store = ChatMessage::create([
                'from_user_id' => auth_id(),
                'to_user_id'   => 1,
                'message'      => $request->message,
                'category'     => $request->category,
                'file_path'    => $file,
            ]);
            if ($count === 0) {
                ChatMessage::create([
                    'from_user_id' => 1,
                    'to_user_id'   => auth_id(),
                    'message'      => 'Terima kasih telah memulai percakapan. Admin akan membalas pesan anda. Ada yang bisa kami bantu?',
                    'category'     => $request->category,
                ]);
            }
            User::where('id', auth_id())->update(['last_seen_at' => now()]);
        }
        return ['status' => 'success', 'data' => $store];
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param CrudExample $crudExample
     * @return Response
     */
    public function edit(Request $request, CrudExample $crudExample)
    {
        return $this->prepareDetailForm($request, $crudExample);
    }

    /**
     * update data to db
     *
     * @param CrudExampleRequest $request
     * @param CrudExample $crudExample
     * @return Response
     */
    public function update(CrudExampleRequest $request, CrudExample $crudExample)
    {
        return $this->executeUpdate($request, $crudExample, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param CrudExample $crudExample
     * @return Response
     */
    public function show(Request $request, CrudExample $crudExample)
    {
        return $this->prepareDetailForm($request, $crudExample, true);
    }

    /**
     * delete data from db
     *
     * @param CrudExample $crudExample
     * @return Response
     */
    public function destroy(CrudExample $crudExample)
    {
        $this->fileService->deleteCrudExampleFile($crudExample);
        return $this->executeDestroy($crudExample);
    }

    /**
     * download import example
     *
     * @return BinaryFileResponse
     */
    public function importExcelExample(): BinaryFileResponse
    {
        // bisa gunakan file excel langsung sebagai contoh
        // $filepath = public_path('example.xlsx');
        // return response()->download($filepath);

        return $this->executeImportExcelExample();
    }

    /**
     * get room id for superadmin
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getRoomId(Request $request)
    {
        if (is_superadmin()) {
            $userId = User::where('uuid', $request->uuid)->value('id');
            $roomId = md5('1_' . $userId);
            return response()->json([
                'success' => true,
                'roomId'  => $roomId,
            ]);
        }
        return response()->json([
            'success' => false,
            'roomId'  => null,
        ]);
    }

    /**
     * reset chat history
     *
     * @param string $category
     * @return Response
     */
    public function reset(string $category)
    {
        if (is_user()) {
            ChatMessage::where('category', $category)
                ->where(function ($query) {
                    $query->where('from_user_id', auth_id())
                        ->orWhere('to_user_id', auth_id());
                })
                ->whereNull('deleted_at')
                ->update(['deleted_at' => now()]);
            return back()->with('successMessage', 'Riwayat chat berhasil dihapus.');
        }
        abort(403);
    }
}
