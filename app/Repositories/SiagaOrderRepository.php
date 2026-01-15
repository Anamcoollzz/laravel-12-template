<?php

namespace App\Repositories;

use App\Models\SiagaOrder;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class SiagaOrderRepository extends Repository
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new SiagaOrder();
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
            
            'full_name' => fn(SiagaOrder $item) => $item->full_name,
            'phone_number' => fn(SiagaOrder $item) => $item->phone_number,
            'lokasi_keberangkatan' => fn(SiagaOrder $item) => $item->lokasi_keberangkatan,
            'alamat_tujuan' => fn(SiagaOrder $item) => $item->alamat_tujuan,
            'car_type' => fn(SiagaOrder $item) => $item->car_type,
            'tgl_penggunaan' => fn(SiagaOrder $item) => $item->tgl_penggunaan,
            'perkiraan_jam' => fn(SiagaOrder $item) => $item->perkiraan_jam,
            'additional_notes' => fn(SiagaOrder $item) => $item->additional_notes,
            'status' => fn(SiagaOrder $item) => $item->status,


            // yang ini bisa dikomen aja kalau gak dipakai
            'currency'         => fn(SiagaOrder $item) => dollar($item->currency),
            'currency_idr'     => fn(SiagaOrder $item) => rp($item->currency_idr),
            'select2_multiple' => '{{implode(", ", $select2_multiple)}}',
            'checkbox'         => '{{implode(", ", $checkbox)}}',
            'checkbox2'        => '{{implode(", ", $checkbox2)}}',
            'tags'             => 'stisla.includes.others.item-tags',
            'file'             => 'stisla.includes.others.item-file',
            'birthdate'        => fn(SiagaOrder $item) => view('stisla.includes.others.item-datetime', ['item' => $item]),
            'email'            => fn(SiagaOrder $item) => view('stisla.includes.others.item-email', ['item' => $item]),
            'phone_number'     => fn(SiagaOrder $item) => view('stisla.includes.others.item-phonenumber', ['item' => $item]),
            'avatar'           => fn(SiagaOrder $item) => view('stisla.includes.others.item-image', ['file' => $item->avatar, 'item' => $item]),
            'image'            => fn(SiagaOrder $item) => view('stisla.includes.others.item-image', ['file' => $item->image, 'item' => $item]),
            'barcode'          => fn(SiagaOrder $item) => \Milon\Barcode\Facades\DNS1DFacade::getBarcodeHTML($item->barcode, 'C39', 1, 10),
            'qr_code'          => fn(SiagaOrder $item) => \Milon\Barcode\Facades\DNS2DFacade::getBarcodeHTML($item->qr_code, 'QRCODE', 3, 3),
            'color'            => 'stisla.includes.others.item-color',
            'created_at'       => '{{\Carbon\Carbon::parse($created_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'updated_at'       => '{{\Carbon\Carbon::parse($updated_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            // 'created_by'       => fn(SiagaOrder $siagaOrder) => $siagaOrder->createdBy ? $siagaOrder->createdBy->name : '-',
            // 'last_updated_by'  => fn(SiagaOrder $siagaOrder) => $siagaOrder->lastUpdatedBy ? $siagaOrder->lastUpdatedBy->name : '-',

            // yang ini butuh action
            'action'           => function (SiagaOrder $siagaOrder) use ($additionalParams) {
                $isAjaxYajra = Route::is('siaga-orders.index-ajax-yajra') || request('isAjaxYajra') == 1;
                $data = array_merge($additionalParams ? $additionalParams : [], [
                    'item'        => $siagaOrder,
                    'isAjaxYajra' => $isAjaxYajra,
                ]);
                return view('stisla.includes.forms.buttons.btn-action', $data);
            }
        ];
        $params = [
            'editColumns' => $editColumns,
            'rawColumns'  => ['tags', 'file', 'color', 'action', 'image', 'barcode', 'qr_code', 'avatar', 'phone_number', 'email', 'birthdate'],
            'addColumns'  => [
                'created_by' => function (SiagaOrder $item) {
                    return $item->createdBy ? $item->createdBy->name : '-';
                },
                'last_updated_by' => function (SiagaOrder $item) {
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
            
            ['data' => 'full_name', 'name' => 'full_name'],
            ['data' => 'phone_number', 'name' => 'phone_number'],
            ['data' => 'lokasi_keberangkatan', 'name' => 'lokasi_keberangkatan'],
            ['data' => 'alamat_tujuan', 'name' => 'alamat_tujuan'],
            ['data' => 'car_type', 'name' => 'car_type'],
            ['data' => 'tgl_penggunaan', 'name' => 'tgl_penggunaan'],
            ['data' => 'perkiraan_jam', 'name' => 'perkiraan_jam'],
            ['data' => 'additional_notes', 'name' => 'additional_notes'],
            ['data' => 'status', 'name' => 'status'],

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
