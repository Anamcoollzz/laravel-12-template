<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FingerPrintX105IdRequest;
use App\Repositories\FingerPrintX105IdRepository;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FingerPrintX105IdController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = 'Sidik Jari X105-ID';

        parent::__construct();

        $this->icon         = 'fa fa-fingerprint';
        $this->repository   = new FingerPrintX105IdRepository;
        $this->prefix       = $this->viewFolder = 'finger-print-x105-ids';
        $this->pdfPaperSize = 'A2';
        $this->isCrud       = true;
        $this->request      = new FingerPrintX105IdRequest;
        $this->fileColumns = [
            'file',
            'image',
            'avatar',
        ];
        // $this->import     = new FingerPrintX105IdImport;

        $this->defaultMiddleware($this->title);
    }

    /**
     * prepare index
     *
     * @param Request $request
     * @param array $data
     * @return Response
     */
    protected function prepareIndex(Request $request, array $data2 = [])
    {
        $data = array_merge($this->getIndexDataFromParent($data2), $data2, ['prefix' => $this->prefix]);
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data'    => view('stisla.' . $this->prefix . '.table', $data)->render(),
            ]);
        }

        if ($request->ip) {
            $IP = request('ip');
            $Key = request('key');
            $id = request('id');
            $fn = request('fn');

            if ($IP == '') {
                $IP = '192.168.1.201';
            }
            if ($Key == '') {
                $Key = '0';
            }
            if ($id == '') {
                $id = '1';
            }
            if ($fn == '') {
                $fn = '0';
            }
            try {
                $Connect = fsockopen($IP, "80", $errno, $errstr, 1);
                if ($Connect) {
                    $soap_request = "<GetUserTemplate><ArgComKey xsi:type=\"xsd:integer\">" . $Key . "</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">" . $id . "</PIN><FingerID xsi:type=\"xsd:integer\">" . $fn . "</FingerID></Arg></GetUserTemplate>";
                    $newLine = "\r\n";
                    fputs($Connect, "POST /iWsService HTTP/1.0" . $newLine);
                    fputs($Connect, "Content-Type: text/xml" . $newLine);
                    fputs($Connect, "Content-Length: " . strlen($soap_request) . $newLine . $newLine);
                    fputs($Connect, $soap_request . $newLine);
                    $buffer = "";
                    while ($Response = fgets($Connect, 1024)) {
                        $buffer = $buffer . $Response;
                    }
                }

                // echo $buffer;

                function Parse_Data($data, $p1, $p2)
                {
                    $data = " " . $data;
                    $hasil = "";
                    $awal = strpos($data, $p1);
                    if ($awal != "") {
                        $akhir = strpos(strstr($data, $p1), $p2);
                        if ($akhir != "") {
                            $hasil = substr($data, $awal + strlen($p1), $akhir - strlen($p1));
                        }
                    }
                    return $hasil;
                }
                $buffer = Parse_Data($buffer, "<GetUserTemplateResponse>", "</GetUserTemplateResponse>");
                $buffer = explode("\r\n", $buffer);
            } catch (\Exception $e) {
                session()->flash('errorMessage', $e->getMessage());
                return view('stisla.finger-print-x105-ids.table', array_merge($data));
            }
        }

        if ($this->isCrud) {
            return view('stisla.finger-print-x105-ids.table', $data);
            return view('stisla.layouts.app-crud-index', $data);
        }

        return view('stisla.' . $this->prefix . '.index', $data);
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
            'name',
        ]);

        if ($request->has('currency') && in_array('currency', $columns))
            $data['currency'] = idr_to_double($request->currency);

        if ($request->has('currency_idr') && in_array('currency_idr', $columns))
            $data['currency_idr'] = rp_to_double($request->currency_idr);

        if ($request->hasFile('file') && in_array('file', $columns))
            $data['file'] = $this->fileUtil->uploadToFolder($request->file('file'), 'finger-print-x105-ids/files');

        if ($request->hasFile('image') && in_array('image', $columns))
            $data['image'] = $this->fileUtil->uploadToFolder($request->file('image'), 'finger-print-x105-ids/images');

        if ($request->hasFile('avatar') && in_array('avatar', $columns))
            $data['avatar'] = $this->fileUtil->uploadToFolder($request->file('avatar'), 'finger-print-x105-ids/avatars');

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
