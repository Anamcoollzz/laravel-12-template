<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolYearRequest;
use App\Repositories\SchoolYearRepository;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SchoolYearController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = 'Tahun Pelajaran';

        parent::__construct();

        $this->icon         = 'fa fa-calendar';
        $this->repository   = new SchoolYearRepository;
        $this->prefix       = $this->viewFolder = 'school-years';
        $this->pdfPaperSize = 'A2';
        $this->isCrud       = true;
        $this->request      = new SchoolYearRequest;
        $this->fileColumns = [
            'file',
            'image',
            'avatar',
        ];
        // $this->import     = new SchoolYearImport;

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

        $columns = $this->repository->getColumns();

        // ini bisa dikomen nanti
        $data = [];

        $formColumns = [
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
        ];

        foreach ($formColumns as $column) {
            if (in_array($column, $columns) && $request->has($column)) {
                $data[$column] = $request->input($column);
            }
        }

        if (in_array('is_active', $columns)) {
            $data['is_active'] = $request->filled('is_active');
        }

        $data = request()->only([
            'year_name',
        ]);

        if ($request->has('currency') && in_array('currency', $columns))
            $data['currency'] = idr_to_double($request->currency);

        if ($request->has('currency_idr') && in_array('currency_idr', $columns))
            $data['currency_idr'] = rp_to_double($request->currency_idr);

        if ($request->hasFile('file') && in_array('file', $columns))
            $data['file'] = $this->fileUtil->uploadToFolder($request->file('file'), 'school-years/files');

        if ($request->hasFile('image') && in_array('image', $columns))
            $data['image'] = $this->fileUtil->uploadToFolder($request->file('image'), 'school-years/images');

        if ($request->hasFile('avatar') && in_array('avatar', $columns))
            $data['avatar'] = $this->fileUtil->uploadToFolder($request->file('avatar'), 'school-years/avatars');

        if ($request->password  && in_array('password', $columns))
            $data['password'] = bcrypt($request->password);

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
