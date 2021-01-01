<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Homepage extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();

        
        $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";

        $result = $db -> query($sql);
        $row = $result -> getResult('array');


        $data = [
            'judul' => 'Kategori',
            'menu' => $row
        ];

		return view('template/pelanggan', $data);
	}

	//--------------------------------------------------------------------

}
