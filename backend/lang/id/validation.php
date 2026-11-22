<?php

return [
    'required' => ':attribute wajib diisi.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'unique' => ':attribute sudah digunakan. Silakan gunakan yang lain.',
    'min' => [
        'string' => ':attribute minimal harus :min karakter.',
    ],
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',

    'attributes' => [
        'name' => 'Nama',
        'email' => 'Email',
        'password' => 'Password',
        'role' => 'Role',
    ],
];
