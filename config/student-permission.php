<?php

return [ // mahasiswa
    [
        'name' => 'Mahasiswa',
        'roles' => ['superadmin', 'admin', 'mahasiswa', 'pimpinan fakultas'],
        'group' => 'Mahasiswa',
        'table' => 'students',
    ],
    [
        'name' => 'Mahasiswa Tambah',
        'roles' => ['superadmin', 'admin'],
        'group' => 'Mahasiswa',
        'table' => 'students',
    ],
    [
        'name' => 'Mahasiswa Impor Excel',
        'roles' => ['superadmin', 'admin'],
        'group' => 'Mahasiswa',
        'table' => 'students',
    ],
    [
        'name' => 'Mahasiswa Ubah',
        'roles' => ['superadmin', 'admin', 'mahasiswa'],
        'group' => 'Mahasiswa',
        'table' => 'students',
    ],
    [
        'name' => 'Mahasiswa Detail',
        'roles' => ['superadmin', 'admin', 'mahasiswa', 'pimpinan fakultas'],
        'group' => 'Mahasiswa',
        'table' => 'students',
    ],
    [
        'name' => 'Mahasiswa Hapus',
        'roles' => ['superadmin', 'admin'],
        'group' => 'Mahasiswa',
        'table' => 'students',
    ],
    [
        'name' => 'Mahasiswa Ekspor',
        'roles' => ['superadmin', 'admin', 'pimpinan fakultas'],
        'group' => 'Mahasiswa',
        'table' => 'students',
    ],
    // [
    //     'name' => 'Mahasiswa Yajra',
    //     'roles' => ['superadmin', 'admin', 'banker'],
    //     'group' => 'Mahasiswa',
    // 'table' => 'students',
    // ],
    // [
    //     'name' => 'Mahasiswa Ajax Yajra',
    //     'roles' => ['superadmin', 'admin', 'banker'],
    //     'group' => 'Mahasiswa',
    // 'table' => 'students',
    // ]
];
