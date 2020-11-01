<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo "<h3>Belajar ci4, yok semangat!</h3>";
	}

	public function select()
	{

		$model = new Kategori_M();
		$kategori = $model -> findAll();

		// echo "<pre>";
		// print_r($kategori);
		// echo "</pre>";


		$data = [
			'judul' => 'SELECT DATA dari controller',
			'kategori' => $kategori
		];

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		//echo view("template/header");
		return view("kategori/select", $data);
		//echo view("template/footer");
	}

	public function selectwhere($id = null, $nama = null)
	{
		echo "<h3>Menampilkan data yang dpilih, id yang dipilih adalah : $id, dan nama adalah : $nama</h3>";
	}

	public function formInsert()
	{
		//echo view("template/header");
		return view("kategori/forminsert");
		//echo view("template/footer");
	}

	public function formUpdate($id = null)
	{
		echo view("template/header");
		echo view("kategori/update");
		echo view("template/footer");
	}

	public function updatedata($id = null)
	{
		echo "Proses update data : $id";
	}

	public function delete($id = null)
	{
		echo "Proses delete data";
	}


	//--------------------------------------------------------------------

	
}
