<?php namespace App\Models;
use CodeIgniter\Model;

class Kategori_M extends Model
{
    protected $table = 'tblkategori';

    protected $allowedFields = ['kategori', 'keterangan'];

    protected $primaryKey = 'idkategori';

    protected $validationRules = [
            'kategori' => 'alpha_numeric_space|min_length[3]|is_unique[tblkategori.kategori]'
    ];

    protected $validationMessages = [
        'kategori' =>[
            'alpha_numeric_space' => 'Mohon maaf, di dalam pengisian kategori, tidak boleh menggunakan simbol, 
            harus diisi dengan huruf, angka, dan spasi.',
            'min_length' => 'Isi minimal dari data yang dimasukkan adalah 3 huruf',
            'is_unique' => 'Nama kategori sudah terdaftar, silahkan menggunakan nama yang lain'
        ]
    ];

}




?>