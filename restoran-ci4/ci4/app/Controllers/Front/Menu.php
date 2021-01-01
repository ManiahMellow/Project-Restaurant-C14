<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\OrderDetail_M;
use App\Models\OrderDetail2_M;

class Menu extends BaseController
{
	public function index($id = null)
	{
        $db = \Config\Database::connect();
        $pager = \Config\Services::pager();

        
        $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";

        $result = $db -> query($sql);
        $row = $result -> getResult('array');

        $model = new Menu_M();

        $data = [
            'judul' => 'DAFTAR MENU',

            'menu' => $row,
            'daftar' => $model -> paginate(3, 'info'),
			'pager' => $model -> pager
        ];

        return view('front/menu', $data);
    }

    public function option($id)
    {
           $db = \Config\Database::connect();
           $pager = \Config\Services::pager();
                  
           $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";
   
           $result = $db -> query($sql);
           $row = $result -> getResult('array');
           
       if (isset($id)) {
            $model = new Menu_M();
            $jumlah = $model -> where('idkategori', $id) -> findAll();
            $count = count($jumlah);

            $tampil = 3;
            $mulai = 0;
            
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                $mulai = ($tampil * $page) - $tampil;
            }

            $data = [
                'judul' => 'DAFTAR MENU',
 
                'menu' => $row,
                'hasil' => $model -> where('idkategori', $id) -> findAll($tampil, $mulai),
                'tampil' => $tampil,
                'total' => $count,
                'pager' => $pager
            ];
 
            return view('front/option', $data);
       }
    }

    public function beli($id = null)
    {

        $db = \Config\Database::connect();
    
                  
        $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";
   
        $result = $db -> query($sql);
        $row = $result -> getResult('array');


        $model_kategori = new Kategori_M();
        $model_menu = new Menu_M();

        $total = 0;

        if (isset($id)) {
            $this -> isi($id);

            return redirect() -> to(base_url('Front/Menu/beli'));
        } else {
            foreach (session() -> get() as $key => $value) {
                if ($key<>'__ci_last_regenerate' && $key<>'_ci_previous_url' && $key<>'pelanggan' && $key<>'email' && $key<>'idpelanggan') {
                   $id = substr($key, 1);

                   $menu[] = $model_menu -> where('idmenu', $id)-> findAll();
                   $jumlah[] = $value;
                }
            }
        }


        if (!isset($menu)) {
            $menu = [];
            $jumlah = [];
        }

        $data = [
            'kategori' => $model_kategori -> findAll(),
            'menu' => $row,
            'menuu' => $menu,
            'jumlah' => $jumlah,
            'total' => $total
        ];

        return view('front/cart', $data);

    }

    public function isi($id)
    {
        if (session() -> has('_'.$id)) {
            session() -> set('_'.$id, session() -> get('_'.$id)+1);
        }else {
            session() -> set('_'.$id, 1);
        }
    }

    public function tambah($id = null)
    {
        session()->set('_' . $id, session()->get('_' . $id) + 1);
        return redirect()->to(base_url('Front/Menu/beli'));
    }

    public function kurang($id = null)
    {
        $idmenu = '_' . $id;
        session()->set($idmenu, session()->get($idmenu) - 1);
        if (session()->get($idmenu) == 0) {
            session()->remove($idmenu);
        }
        return redirect()->to(base_url('Front/Menu/beli'));
    }

    public function hapus($id = null)
    {
        $idmenu = '_'.$id;
        session()->remove($idmenu);
        return redirect()->to(base_url('Front/Menu/beli'));
    }

    public function idorder()
    {
        $db    = \Config\Database::connect();

        $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
        $result = $db->query($sql);
        $detail = $result->getResult('array');
        $count = count($detail);

        if ($count == 0) {
            $id = 1;
        } else {
            $id = $count + 1; 
        }
        return $id;
    }

    public function insertOrder($idorder, $idpelanggan, $tgl, $total)
    {
        $db    = \Config\Database::connect();
        $sql = "INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tgl', $total, 0, 0, 0)";
        $db->query($sql);
    }

    public function insertOrderDetail($idorder)
    {
        $model_menu = new Menu_M();
        $model_orderdetail = new OrderDetail2_M();

        foreach (session()->get() as $key => $value) {
            if (
                $key<>'__ci_last_regenerate' && $key<>'_ci_previous_url' && $key<>'pelanggan' 
                && $key<>'email' && $key<>'idpelanggan'
            ) {
                $id = substr($key, 1);
                $produk = $model_menu->where('idmenu', $id)->findAll();
                foreach ($produk as $key) {
                    $idmenu = $key['idmenu'];
                    $harga = $key['harga'];
                    $data = [
                        'idorder' => $idorder,
                        'idmenu' => $idmenu,
                        'jumlah' => $value,
                        'hargajual' => $harga
                    ];
                    $model_orderdetail->insert($data);
                }
            }
        }
    }

    public function checkout($total = null)
    {
        $db    = \Config\Database::connect();
        
        if (isset($total)) {
            
            $idorder = $this->idorder();
            $idpelanggan = session()->get('idpelanggan');
            $tgl = date('Y-m-d');
            

            $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";
            $result = $db->query($sql);
            $detail = $result->getResult('array');

            $count = count($detail);

            if ($count == 0) {
                

                $this->insertOrder($idorder, $idpelanggan, $tgl, $total);
                $this->insertOrderDetail($idorder);
            } else {
                $this->insertOrderDetail($idorder);
            }
            $this->kosonganSession();
            return redirect()->to(base_url('Front/Menu/checkout'));
        } else {

            $id = $this->idorder() + 1;
            $model_kategori = new Kategori_M();

            $data = [
                'id' => $id,
                'menu' => $model_kategori->findAll(),
            ];

            return view('front/info', $data);
        }
    }

    public function kosonganSession()
    {
        foreach (session()->get() as $key => $value) {
            if (
                $key<>'__ci_last_regenerate' && $key<>'_ci_previous_url' && $key<>'pelanggan' 
                && $key<>'email' && $key<>'idpelanggan'
            ) {
                $id = substr($key, 1);
                session()->remove('_'.$id);
            }
        }
    }

    public function history()
    {   
        $db    = \Config\Database::connect();

        $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";
   
        $result = $db -> query($sql);
        $row = $result -> getResult('array');

        $model_kategori = new Kategori_M();

        $vorder = $db->table('vorder');
        $email = session()->get('email');
        $result = $vorder->getWhere(['email' => $email]);

        $halaman = $result->getResult('array');
        $count = count($halaman);

        $result = $vorder->getWhere(['email' => $email]);
        $vo = $result->getResult('array');

        $data = [
            'menu' => $row,
            'vorder' => $vo,
            'total' => $count
        ];

        return view("front/history", $data);
    }

    public function detail($id)
    {
        $db    = \Config\Database::connect();

        $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";
   
        $result = $db -> query($sql);
        $row = $result -> getResult('array');

        $model_orderdetail = new OrderDetail_M();

        $jumlah = $model_orderdetail->where('idorder', $id)->findAll();
        $count = count($jumlah);

        $detail = $model_orderdetail->where('idorder', $id)->findAll();

        $data = [
            'detail' => $detail,
            'menu' => $row
        ];

        return view('front/detail', $data);
    }


    

	//--------------------------------------------------------------------

}