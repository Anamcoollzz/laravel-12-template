@include('stisla.includes.forms.inputs.input', [
    'id' => $id ?? 'date',
    'label' => $label ?? __('Tanggal'),
    'icon' => $icon ?? 'fas fa-calendar',
    'required' => true,
    'type' => $type ?? 'date',
])
