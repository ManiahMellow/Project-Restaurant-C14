<?php namespace App\Models;
use CodeIgniter\Model;

class Menu_M extends Model
{
    protected $table = 'tblmenu';

    protected $primaryKey = 'idmenu';

    protected $allowedFields = ['idkategori', 'menu', 'gambar', 'harga'];

    protected $validationRules = [
        'menu' => 'alpha_numeric_space|min_length[3]|is_unique[tblmenu.menu]',
        'harga' => 'numeric'
    ];

    protected $validationMessages = [
        'menu' =>[
            'alpha_numeric_space' => 'Mohon maaf, di dalam pengisian menu, tidak boleh menggunakan simbol, 
            harus diisi dengan huruf, angka, dan spasi.',
            'min_length' => 'Isi minimal dari data yang dimasukkan adalah 3 huruf',
            'is_unique' => 'Nama menu sudah terdaftar, silahkan menggunakan nama yang lain'
        ],
        'harga' =>[
            'numeric' => 'Mohon maaf, di dalam pengisian harga, tidak boleh menggunakan simbol, 
            harus diisi dengan angka.'
        ]
    ];


}

?>