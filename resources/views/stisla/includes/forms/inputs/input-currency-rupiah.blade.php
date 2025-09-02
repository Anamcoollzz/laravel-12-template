@include('stisla.includes.forms.inputs.input-currency', [
    'required' => true,
    'name' => $name ?? 'currency_idr',
    'label' => $label ?? 'Currency IDR',
    'id' => $id ?? 'currency_idr',
    'currency_type' => 'rupiah',
    'iconText' => 'IDR',
])
