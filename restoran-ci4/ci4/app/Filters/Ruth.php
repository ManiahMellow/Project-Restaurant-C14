<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Ruth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = NULL)
    {
        if (!session() -> get('loggedIn')) {
            return redirect()->to(base_url('/Front/Login'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}