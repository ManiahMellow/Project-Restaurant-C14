<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    
    protected $session = null;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    
    public function index()
	{
		echo "USER";
    }
    
    public function create()
    {

        $tbluser = [
            'user'  => 'koki',
            'email' => 'koki@gmail.com',
            'level' => 'koki'

        ];

        $this->session->set($tbluser);
        print_r($tbluser);

    }

    public function read()
    {
        echo $this->session -> get('user')."<br>";
        echo $this->session -> get('email')."<br>";
        echo $this->session -> get('level')."<br>";

    }

    public function hapus()
    {
        $this->session -> remove('level');
    }

    public function destroy()
    {
        $this->session -> destroy();
    }


	//--------------------------------------------------------------------

}
