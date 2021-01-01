<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;

class Daftar extends BaseController
{
	public function index()
	{

        return view('front/daftar');
    }

    public function insert()
    {

        $data = [];
        if (isset($_POST['login'])) {

            $data = [
               
                'pelanggan' => $_POST['pelanggan'],
                'alamat' => $_POST['alamat'],
                'telp' => $_POST['telp'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'aktif' => 1
            ];

            $model = new Pelanggan_M();

            if ($model -> insert($data)===false) {
                $error = $model->errors();
    
                session() -> setFlashdata('info', $error);
                return redirect()->to(base_url("/Front/Daftar"));
            } else {
                echo "PENDAFTARAN BERHASIL, SILAHKAN LOGIN";
                return redirect()->to(base_url("/Front/Login"));
            }
        }
        		
    }

	//--------------------------------------------------------------------

}