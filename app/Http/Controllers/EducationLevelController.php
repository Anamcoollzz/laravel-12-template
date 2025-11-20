<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationLevelRequest;
use App\Repositories\EducationLevelRepository;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class EducationLevelController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = 'Jenjang Pendidikan';

        parent::__construct();

        $this->icon         = 'fa fa-graduation-cap';
        $this->repository   = new EducationLevelRepository;
        $this->prefix       = $this->viewFolder = 'education-levels';
        $this->pdfPaperSize = 'A2';
        $this->isCrud       = true;
        $this->request      = new EducationLevelRequest;
        $this->fileColumns = [
            'file',
            'image',
            'avatar',
        ];
        // $this->import     = new EducationLevelImport;

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
            'education_level',
        ]);

        if ($request->has('currency') && in_array('currency', $columns))
            $data['currency'] = idr_to_double($request->currency);

        if ($request->has('currency_idr') && in_array('currency_idr', $columns))
            $data['currency_idr'] = rp_to_double($request->currency_idr);

        if ($request->hasFile('file') && in_array('file', $columns))
            $data['file'] = $this->fileUtil->uploadToFolder($request->file('file'), 'education-levels/files');

        if ($request->hasFile('image') && in_array('image', $columns))
            $data['image'] = $this->fileUtil->uploadToFolder($request->file('image'), 'education-levels/images');

        if ($request->hasFile('avatar') && in_array('avatar', $columns))
            $data['avatar'] = $this->fileUtil->uploadToFolder($request->file('avatar'), 'education-levels/avatars');

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

    /**
     * show select education level page
     *
     * @return \Illuminate\View\View
     */
    public function select()
    {
        return view('stisla.education-level.select', [
            'levels' => $this->repository->all(),
        ]);
    }

    /**
     * set education level
     *
     * @param integer $education_level_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function set($education_level_id)
    {
        $level = $this->repository->findOrFail($education_level_id);
        session([
            'education_level' => $level->education_level,
            'education_level_id' => $level->id
        ]);
        return redirect()->route('dashboard.index')->with('successMessage', 'Jenjang pendidikan berhasil diset ke ' . $level->education_level);
    }
}
