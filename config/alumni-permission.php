<?php

return [
    [
        'name' => 'Alumni',
        'roles' => ['superadmin', 'admin', 'mahasiswa', 'pimpinan fakultas'],
        'group' => 'Alumni',
        'table' => 'students',
    ],
    // [
    //     'name' => 'Alumni Tambah',
    //     'roles' => ['superadmin', 'admin', 'mahasiswa'],
    //     'group' => 'Alumni',
    // 'table'=>'students',
    // ],
    // [
    //     'name' => 'Alumni Impor Excel',
    //     'roles' => ['superadmin', 'admin', 'mahasiswa'],
    //     'group' => 'Alumni',
    // 'table'=>'students',
    // ],
    [
        'name' => 'Alumni Ubah',
        'roles' => ['superadmin', 'admin', 'mahasiswa'],
        'group' => 'Alumni',
        'table' => 'students',
    ],
    [
        'name' => 'Alumni Detail',
        'roles' => ['superadmin', 'admin', 'mahasiswa', 'pimpinan fakultas'],
        'group' => 'Alumni',
        'table' => 'students',
    ],
    [
        'name' => 'Alumni Hapus',
        'roles' => ['superadmin', 'admin'],
        'group' => 'Alumni',
        'table' => 'students',
    ],
    [
        'name' => 'Alumni Ekspor',
        'roles' => ['superadmin', 'admin', 'pimpinan fakultas'],
        'group' => 'Alumni',
        'table' => 'students',
    ],
    [
        'name' => 'Alumni Yajra',
        'roles' => ['superadmin', 'admin'],
        'group' => 'Alumni',
        'table' => 'students',
    ],
    [
        'name' => 'Alumni Ajax Yajra',
        'roles' => ['superadmin', 'admin'],
        'group' => 'Alumni',
        'table' => 'students',
    ]
];
