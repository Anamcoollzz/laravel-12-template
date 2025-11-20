@include('stisla.includes.forms.inputs.input-image', [
    'id' => $id ?? 'avatar',
    'icon' => 'fas fa-camera-retro',
    'label' => $label ?? __('Avatar'),
])
