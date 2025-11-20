@include('stisla.includes.forms.inputs.input-currency', [
    'required' => $required ?? false,
    'name' => $name ?? ($id ?? 'currency_idr'),
    'label' => $label ?? 'Currency IDR',
    'id' => $id ?? 'currency_idr',
    'currency_type' => 'rupiah',
    'iconText' => 'IDR',
])
