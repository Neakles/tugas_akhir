<?php

namespace App\Middleware;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Security\Csrf;

class AuthMiddleware {

    public function handle(RequestInterface $request, ResponseInterface $response) {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return $this->getNextHandler($request, $response);
    }
}

?>