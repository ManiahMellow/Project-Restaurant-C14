<?php namespace App\Models;
use CodeIgniter\Model;

class Pelanggan_M extends Model
{
    protected $table = 'tblpelanggan';

    protected $primaryKey = 'idpelanggan';

    protected $allowedFields = ['pelanggan', 'alamat', 'telp', 'email', 'password', 'aktif'];

    protected $validationRules = [
        'pelanggan' => 'alpha_numeric_space|min_length[3]|is_unique[tblpelanggan.pelanggan]',
        'email' => 'valid_email'
    ];

    protected $validationMessages = [
        'pelanggan' =>[
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