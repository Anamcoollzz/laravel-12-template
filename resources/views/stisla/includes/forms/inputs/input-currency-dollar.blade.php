@include('stisla.includes.forms.inputs.input-currency', [
    'required' => true,
    'name' => $name ?? 'currency',
    'label' => $label ?? 'Currency',
    'id' => $id ?? 'currency',
    'currency_type' => 'default',
])
