<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User_M;

class User extends BaseController
{
    public function index()
    {    
		$pager = \Config\Services::pager();

		$model = new User_M();


		$data = [
			'judul' => 'DATA USER',
			
			'user' => $model -> paginate(3, 'page'),
			'pager' => $model -> pager
		];

		echo view("user/select", $data);      
    }

    public function create()
    {
        $data = [
            'level' => ['Admin', 'Koki', 'Kasir', 'Gudang']
        ];

        return view("user/insert", $data);
    }

    public function insert()
    {

        if (isset($_POST['simpan'])) {

            $data = [
               
                'user' => $_POST['user'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'level' => $_POST['level'],
                'aktif' => 1
            ];

            $model = new User_M();

            if ($model -> insert($data)===false) {
                $error = $model->errors();
    
                session() -> setFlashdata('info', $error);
                return redirect()->to(base_url("/Admin/User/create"));
            } else {
                return redirect()->to(base_url("/Admin/User"));
            }
        }
        
		
    }

    public function delete($id = null)
	{
		
		$model = new User_M();
		$model -> delete($id);

		return redirect()->to(base_url("/Admin/User"));
    }
    
    public function update($id = null, $isi = 1)
    {
        $model = new User_M();

        if ($isi == 1) {
            $isi = 0;
        } else {
            $isi =1;
        }

        $data = [
            'aktif' => $isi
        ];

        $model -> update($id, $data);
        return redirect() -> to(base_url("Admin/User"));
    }

    public function find($id = null)
    {
        $model = new User_M();
		$user = $model ->find($id);

		$data = [
			'judul' => 'UPDATE USER',
            'user' => $user,
            'level' => ['Admin', 'Koki', 'Kasir', 'Gudang']
		];

		return view("user/update", $data);
    }
    
    public function ubah()
    {
        $id = $_POST['iduser'];
        $data = [
            'email' => $_POST['email'],
            'level' => $_POST['level']
        ];

        $model = new User_M();
        $model -> update($id, $data);

        return redirect() -> to(base_url("/Admin/User"));
    }

    


	//--------------------------------------------------------------------

}
