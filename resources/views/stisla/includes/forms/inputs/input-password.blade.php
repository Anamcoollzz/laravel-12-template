@include('stisla.includes.forms.inputs.input', [
    'id' => $id ?? 'password',
    'type' => 'password',
    'label' => $label ?? 'Password',
    'required' => isset($d) ? false : true,
    'icon' => 'fas fa-key',
    'value' => '',
    'hint' => isset($d) ? 'Password bisa dikosongi' : false,
])
