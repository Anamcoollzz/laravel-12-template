@include('stisla.includes.forms.inputs.input', [
    'required' => $required ?? (isset($d) ? false : true),
    'id' => $id ?? 'image',
    'type' => 'file',
    'label' => $label ?? 'Image',
    'accept' => 'image/*',
    'link_file' => isset($d) ? $d->image : null,
    'link_file_name' => isset($d) ? basename($d->image) : null,
    'icon' => 'fas fa-image',
    'disabled' => $disabled ?? false,
])
