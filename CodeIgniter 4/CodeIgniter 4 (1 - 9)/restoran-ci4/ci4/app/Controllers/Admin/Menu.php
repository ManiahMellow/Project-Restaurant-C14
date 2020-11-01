<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Menu extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo "<h3>Belajar ci4, yok semangat!</h3>";
    }
    
    public function select()
    {
        echo "<h3>Untuk menampilkan data</h3>";
    }

    public function update($id=null, $nama=null)
    {
        echo "<h3>Untuk update data dengan id : $id  , $nama </h3>";
    }

	//--------------------------------------------------------------------

}

