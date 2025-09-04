<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Imports\WorkImport;
use App\Models\Work;
use App\Repositories\WorkRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class WorkController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->icon       = 'fa fa-bag';
        $this->repository = new WorkRepository;
        $this->prefix     = $this->viewFolder            = 'works';
        $this->pdfPaperSize = 'A2';
        // $this->import     = new WorkImport;

        $this->defaultMiddleware($this->title = 'Pekerjaan');
    }

    /**
     * prepare store data
     *
     * @param WorkRequest $request
     * @return array
     */
    public function getStoreData(WorkRequest $request)
    {
        $data = $request->only([
            'job_name',
            'department',
        ]);

        // $data['currency']     = idr_to_double($request->currency);
        // $data['currency_idr'] = rp_to_double($request->currency_idr);

        // if ($request->hasFile('file'))
        //     $data['file'] = $this->fileService->uploadWorkFile($request->file('file'));

        // if ($request->hasFile('image'))
        //     $data['image'] = $this->fileService->uploadWorkFile($request->file('image'));

        // if ($request->hasFile('avatar'))
        //     $data['avatar'] = $this->fileService->uploadWorkFile($request->file('avatar'));

        // if ($request->password) {
        //     $data['password'] = bcrypt($request->password);
        // }

        return $data;
    }

    /**
     * showing data page
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->prepareIndex($request, ['data' => $this->repository->getFullDataWith(['createdBy', 'lastUpdatedBy'])]);
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
     * @param WorkRequest $request
     * @return Response
     */
    public function store(WorkRequest $request)
    {
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param Work $work
     * @return Response
     */
    public function edit(Request $request, Work $work)
    {
        return $this->prepareDetailForm($request, $work);
    }

    /**
     * update data to db
     *
     * @param WorkRequest $request
     * @param Work $work
     * @return Response
     */
    public function update(WorkRequest $request, Work $work)
    {
        return $this->executeUpdate($request, $work, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param Work $work
     * @return Response
     */
    public function show(Request $request, Work $work)
    {
        return $this->prepareDetailForm($request, $work, true);
    }

    /**
     * delete data from db
     *
     * @param Work $work
     * @return Response
     */
    public function destroy(Work $work)
    {
        // $this->fileService->deleteWorkFile($work);
        return $this->executeDestroy($work);
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
}
