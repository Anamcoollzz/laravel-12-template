<?php

namespace App\Repositories;

use App\Models\Status;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class StatusRepository extends Repository
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Status();
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

            'name' => fn(Status $item) => $item->name,


            // yang ini bisa dikomen aja kalau gak dipakai
            'currency'         => fn(Status $item) => dollar($item->currency),
            'currency_idr'     => fn(Status $item) => rp($item->currency_idr),
            'select2_multiple' => '{{implode(", ", $select2_multiple)}}',
            'checkbox'         => '{{implode(", ", $checkbox)}}',
            'checkbox2'        => '{{implode(", ", $checkbox2)}}',
            'tags'             => 'stisla.includes.others.item-tags',
            'file'             => 'stisla.includes.others.item-file',
            'birthdate'        => fn(Status $item) => view('stisla.includes.others.item-datetime', ['item' => $item]),
            'email'            => fn(Status $item) => view('stisla.includes.others.item-email', ['item' => $item]),
            'phone_number'     => fn(Status $item) => view('stisla.includes.others.item-phonenumber', ['item' => $item]),
            'avatar'           => fn(Status $item) => view('stisla.includes.others.item-image', ['file' => $item->avatar, 'item' => $item]),
            'image'            => fn(Status $item) => view('stisla.includes.others.item-image', ['file' => $item->image, 'item' => $item]),
            'barcode'          => fn(Status $item) => \Milon\Barcode\Facades\DNS1DFacade::getBarcodeHTML($item->barcode, 'C39', 1, 10),
            'qr_code'          => fn(Status $item) => \Milon\Barcode\Facades\DNS2DFacade::getBarcodeHTML($item->qr_code, 'QRCODE', 3, 3),
            'color'            => 'stisla.includes.others.item-color',
            'created_at'       => '{{\Carbon\Carbon::parse($created_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'updated_at'       => '{{\Carbon\Carbon::parse($updated_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            // 'created_by'       => fn(Status $status) => $status->createdBy ? $status->createdBy->name : '-',
            // 'last_updated_by'  => fn(Status $status) => $status->lastUpdatedBy ? $status->lastUpdatedBy->name : '-',

            // yang ini butuh action
            'action'           => function (Status $status) use ($additionalParams) {
                $isAjaxYajra = Route::is('statuses.index-ajax-yajra') || request('isAjaxYajra') == 1;
                $data = array_merge($additionalParams ? $additionalParams : [], [
                    'item'        => $status,
                    'isAjaxYajra' => $isAjaxYajra,
                ]);
                return view('stisla.includes.forms.buttons.btn-action', $data);
            }
        ];
        $params = [
            'editColumns' => $editColumns,
            'rawColumns'  => ['tags', 'file', 'color', 'action', 'image', 'barcode', 'qr_code', 'avatar', 'phone_number', 'email', 'birthdate'],
            'addColumns'  => [
                'created_by' => function (Status $item) {
                    return $item->createdBy ? $item->createdBy->name : '-';
                },
                'last_updated_by' => function (Status $item) {
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

            ['data' => 'name', 'name' => 'name'],

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

    /**
     * get data as select options
     *
     * @param string $label
     * @param string $value
     * @param array|null $where
     * @param string|null $whereField
     * @param array|null $whereIn
     * @param callable|null $map
     * @return array
     */
    public function getSelectOptionsApproval($label = 'name', $value = 'id', ?array $where = [], ?string $whereField = null, ?array $whereIn = [], ?callable $map = null): array
    {
        $query = $this->query()
            ->when(!empty($where), function ($query) use ($where) {
                $query->where($where);
            })
            ->when(!empty($whereIn), function ($query) use ($whereField, $whereIn) {
                $query->whereIn($whereField, $whereIn);
            })
            ->when($map !== null, function ($query) use ($map) {
                $query->select('*');
            })
            ->when($map === null, function ($query) use ($label, $value) {
                $query->select($label, $value);
            })
            ->whereIn('id', [
                \App\Models\Status::STATUS_DONE,
                \App\Models\Status::STATUS_NEED_REVISION,
            ])
            ->oldest()
            ->get()
            ->when($map !== null, function ($collection) use ($map) {
                return $collection->map($map);
            });
        return $query->pluck($label, $value)->toArray();
    }
}
