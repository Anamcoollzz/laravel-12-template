<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrudExampleRequest;
use App\Repositories\CrudExampleRepository;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CrudExampleController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = 'Contoh CRUD';

        parent::__construct();

        $this->icon         = 'fa fa-atom';
        $this->repository   = new CrudExampleRepository;
        $this->prefix       = $this->viewFolder = 'crud-examples';
        $this->pdfPaperSize = 'A2';
        $this->isCrud       = true;
        $this->request      = new CrudExampleRequest;
        $this->fileColumns = [
            'file',
            'image',
            'avatar',
        ];
        // $this->import     = new CrudExampleImport;

        $this->defaultMiddleware($this->title);
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
            'tinymce',
            'ckeditor',

            //columns
        ]);

        $data['is_active'] = $request->filled('is_active');

        if ($request->has('currency'))
            $data['currency']     = idr_to_double($request->currency);

        if ($request->has('currency_idr'))
            $data['currency_idr'] = rp_to_double($request->currency_idr);

        if ($request->hasFile('file'))
            $data['file'] = $this->fileUtil->uploadToFolder($request->file('file'), 'crud-examples/files');

        if ($request->hasFile('image'))
            $data['image'] = $this->fileUtil->uploadToFolder($request->file('image'), 'crud-examples/images');

        if ($request->hasFile('avatar'))
            $data['avatar'] = $this->fileUtil->uploadToFolder($request->file('avatar'), 'crud-examples/avatars');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        return $data;
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
