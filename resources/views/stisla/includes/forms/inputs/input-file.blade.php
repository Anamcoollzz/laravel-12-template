@include('stisla.includes.forms.inputs.input', [
    'required' => isset($d) ? false : true,
    'name' => $name ?? 'file',
    'type' => 'file',
    'label' => $label ?? 'File',
    'link_file' => isset($d) ? $d->file : null,
    'link_file_name' => isset($d) ? basename($d->file) : null,
    'icon' => 'fa fa-file',
])
