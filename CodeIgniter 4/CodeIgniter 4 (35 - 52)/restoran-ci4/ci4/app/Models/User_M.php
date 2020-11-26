<?php namespace App\Models;
use CodeIgniter\Model;

class User_M extends Model
{
    protected $table = 'tbluser';

    protected $allowedFields = ['user', 'email', 'password', 'level', 'aktif'];

    protected $primaryKey = 'iduser';

    protected $validationRules = [
        'user' => 'alpha_numeric_space|min_length[3]|is_unique[tbluser.user]',
        'email' => 'valid_email'
    ];

    protected $validationMessages = [
        'user' =>[
            'alpha_numeric_space' => 'Mohon maaf, di dalam pengisian user, tidak boleh menggunakan simbol, 
            harus diisi dengan huruf, angka, dan spasi.',
            'min_length' => 'Isi minimal dari data user yang dimasukkan adalah 3 huruf',
            'is_unique' => 'Nama user sudah terdaftar, silahkan menggunakan nama yang lain'
        ],
        'email' =>[
            'valid_email' => 'Silahkan masukkan email dengan valid'
        ]
    ];

}




?>