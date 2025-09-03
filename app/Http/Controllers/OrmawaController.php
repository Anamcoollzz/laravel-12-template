<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrmawaRequest;
use App\Imports\OrmawaImport;
use App\Models\Ormawa;
use App\Repositories\OrmawaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class OrmawaController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->icon       = 'fa fa-sitemap';
        $this->repository = new OrmawaRepository;
        $this->prefix     = $this->viewFolder            = 'ormawas';
        $this->pdfPaperSize = 'A2';
        // $this->import     = new OrmawaImport;

        $this->defaultMiddleware($this->title = 'Ormawa');
    }

    /**
     * prepare store data
     *
     * @param OrmawaRequest $request
     * @return array
     */
    public function getStoreData(OrmawaRequest $request)
    {
        $data = $request->only([
            'name',
        ]);

        // $data['currency']     = idr_to_double($request->currency);
        // $data['currency_idr'] = rp_to_double($request->currency_idr);

        // if ($request->hasFile('file'))
        //     $data['file'] = $this->fileService->uploadOrmawaFile($request->file('file'));

        // if ($request->hasFile('image'))
        //     $data['image'] = $this->fileService->uploadOrmawaFile($request->file('image'));

        // if ($request->hasFile('avatar'))
        //     $data['avatar'] = $this->fileService->uploadOrmawaFile($request->file('avatar'));

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
     * @param OrmawaRequest $request
     * @return Response
     */
    public function store(OrmawaRequest $request)
    {
        return $this->executeStore($request, withUser: true);
    }

    /**
     * showing edit data page
     *
     * @param Request $request
     * @param Ormawa $ormawa
     * @return Response
     */
    public function edit(Request $request, Ormawa $ormawa)
    {
        return $this->prepareDetailForm($request, $ormawa);
    }

    /**
     * update data to db
     *
     * @param OrmawaRequest $request
     * @param Ormawa $ormawa
     * @return Response
     */
    public function update(OrmawaRequest $request, Ormawa $ormawa)
    {
        return $this->executeUpdate($request, $ormawa, withUser: true);
    }

    /**
     * show detail page
     *
     * @param Request $request
     * @param Ormawa $ormawa
     * @return Response
     */
    public function show(Request $request, Ormawa $ormawa)
    {
        return $this->prepareDetailForm($request, $ormawa, true);
    }

    /**
     * delete data from db
     *
     * @param Ormawa $ormawa
     * @return Response
     */
    public function destroy(Ormawa $ormawa)
    {
        // $this->fileService->deleteOrmawaFile($ormawa);
        return $this->executeDestroy($ormawa);
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
