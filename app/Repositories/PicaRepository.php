<?php

namespace App\Repositories;

use App\Models\Pica;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class PicaRepository extends Repository
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Pica();
    }

    /**
     * get data for yajra datatables
     *
     * @param mixed $params
     * @return Response
     */
    public function getYajraDataTables($additionalParams = null)
    {
        $query = $this->query()->when(request('order')[0]['column'] == 0, function ($query) {
            $query->latest();
        })
            ->with(['createdBy', 'lastUpdatedBy']);
        $editColumns = [
            
            'notes' => fn(Pica $item) => $item->notes,
            'function_id' => fn(Pica $item) => $item->function_id,
            'category_id' => fn(Pica $item) => $item->category_id,
            'work_field_id' => fn(Pica $item) => $item->work_field_id,
            'deadline' => fn(Pica $item) => $item->deadline,
            'kpi_related' => fn(Pica $item) => $item->kpi_related,
            'assigned_to' => fn(Pica $item) => $item->assigned_to,
            'created_date' => fn(Pica $item) => $item->created_date,
            'problem_identification' => fn(Pica $item) => $item->problem_identification,
            'corrective_action' => fn(Pica $item) => $item->corrective_action,
            'attachment' => fn(Pica $item) => $item->attachment,
            'evidence' => fn(Pica $item) => $item->evidence,
            'status_id' => fn(Pica $item) => $item->status_id,


            // yang ini bisa dikomen aja kalau gak dipakai
            'currency'         => fn(Pica $item) => dollar($item->currency),
            'currency_idr'     => fn(Pica $item) => rp($item->currency_idr),
            'select2_multiple' => '{{implode(", ", $select2_multiple)}}',
            'checkbox'         => '{{implode(", ", $checkbox)}}',
            'checkbox2'        => '{{implode(", ", $checkbox2)}}',
            'tags'             => 'stisla.includes.others.item-tags',
            'file'             => 'stisla.includes.others.item-file',
            'birthdate'        => fn(Pica $item) => view('stisla.includes.others.item-datetime', ['item' => $item]),
            'email'            => fn(Pica $item) => view('stisla.includes.others.item-email', ['item' => $item]),
            'phone_number'     => fn(Pica $item) => view('stisla.includes.others.item-phonenumber', ['item' => $item]),
            'avatar'           => fn(Pica $item) => view('stisla.includes.others.item-image', ['file' => $item->avatar, 'item' => $item]),
            'image'            => fn(Pica $item) => view('stisla.includes.others.item-image', ['file' => $item->image, 'item' => $item]),
            'barcode'          => fn(Pica $item) => \Milon\Barcode\Facades\DNS1DFacade::getBarcodeHTML($item->barcode, 'C39', 1, 10),
            'qr_code'          => fn(Pica $item) => \Milon\Barcode\Facades\DNS2DFacade::getBarcodeHTML($item->qr_code, 'QRCODE', 3, 3),
            'color'            => 'stisla.includes.others.item-color',
            'created_at'       => '{{\Carbon\Carbon::parse($created_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'updated_at'       => '{{\Carbon\Carbon::parse($updated_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            // 'created_by'       => fn(Pica $pica) => $pica->createdBy ? $pica->createdBy->name : '-',
            // 'last_updated_by'  => fn(Pica $pica) => $pica->lastUpdatedBy ? $pica->lastUpdatedBy->name : '-',

            // yang ini butuh action
            'action'           => function (Pica $pica) use ($additionalParams) {
                $isAjaxYajra = Route::is('picas.index-ajax-yajra') || request('isAjaxYajra') == 1;
                $data = array_merge($additionalParams ? $additionalParams : [], [
                    'item'        => $pica,
                    'isAjaxYajra' => $isAjaxYajra,
                ]);
                return view('stisla.includes.forms.buttons.btn-action', $data);
            }
        ];
        $params = [
            'editColumns' => $editColumns,
            'rawColumns'  => ['tags', 'file', 'color', 'action', 'image', 'barcode', 'qr_code', 'avatar', 'phone_number', 'email', 'birthdate'],
            'addColumns'  => [
                'created_by' => function (Pica $item) {
                    return $item->createdBy ? $item->createdBy->name : '-';
                },
                'last_updated_by' => function (Pica $item) {
                    return $item->lastUpdatedBy ? $item->lastUpdatedBy->name : '-';
                }
            ]
        ];
        return $this->generateDataTables($query, $params);
    }

    /**
     * get yajra columns
     *
     * @return string
     */
    public function getYajraColumns()
    {
        return json_encode([
            [
                'data'       => 'DT_RowIndex',
                'name'       => 'DT_RowIndex',
                'searchable' => false,
                'orderable'  => false
            ],
            
            ['data' => 'notes', 'name' => 'notes'],
            ['data' => 'function_id', 'name' => 'function_id'],
            ['data' => 'category_id', 'name' => 'category_id'],
            ['data' => 'work_field_id', 'name' => 'work_field_id'],
            ['data' => 'deadline', 'name' => 'deadline'],
            ['data' => 'kpi_related', 'name' => 'kpi_related'],
            ['data' => 'assigned_to', 'name' => 'assigned_to'],
            ['data' => 'created_date', 'name' => 'created_date'],
            ['data' => 'problem_identification', 'name' => 'problem_identification'],
            ['data' => 'corrective_action', 'name' => 'corrective_action'],
            ['data' => 'attachment', 'name' => 'attachment'],
            ['data' => 'evidence', 'name' => 'evidence'],
            ['data' => 'status_id', 'name' => 'status_id'],

            // ini bisa dikomen nanti ya kalau tidak digunakan
            ['data' => 'name', 'name' => 'name'],
            ['data' => 'phone_number', 'name' => 'phone_number'],
            ['data' => 'address', 'name' => 'address'],
            ['data' => 'birthdate', 'name' => 'birthdate'],
            ['data' => 'avatar', 'name' => 'avatar'],
            ['data' => 'text', 'name' => 'text'],
            ['data' => 'barcode', 'name' => 'barcode'],
            ['data' => 'qr_code', 'name' => 'qr_code'],
            ['data' => 'email', 'name' => 'email'],
            ['data' => 'number', 'name' => 'number'],
            ['data' => 'currency', 'name' => 'currency'],
            ['data' => 'currency_idr', 'name' => 'currency_idr'],
            ['data' => 'select', 'name' => 'select'],
            ['data' => 'select2', 'name' => 'select2'],
            ['data' => 'select2_multiple', 'name' => 'select2_multiple'],
            ['data' => 'textarea', 'name' => 'textarea'],
            ['data' => 'radio', 'name' => 'radio'],
            ['data' => 'checkbox', 'name' => 'checkbox'],
            ['data' => 'checkbox2', 'name' => 'checkbox2'],
            ['data' => 'tags', 'name' => 'tags'],
            ['data' => 'file', 'name' => 'file'],
            ['data' => 'image', 'name' => 'image'],
            ['data' => 'date', 'name' => 'date'],
            ['data' => 'time', 'name' => 'time'],
            ['data' => 'color', 'name' => 'color'],
            ['data' => 'created_at', 'name' => 'created_at'],
            ['data' => 'updated_at', 'name' => 'updated_at'],
            ['data' => 'created_by', 'name' => 'createdBy.name'],
            ['data' => 'last_updated_by', 'name' => 'lastUpdatedBy.name'],

            // yang ini butuh action
            [
                'data' => 'action',
                'name' => 'action',
                'orderable' => false,
                'searchable' => false
            ],
        ]);
    }

    /**
     * get full data with relations
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFullData()
    {
        return $this->queryFullData()->with(['createdBy', 'lastUpdatedBy'])->latest()->get();
    }
}
