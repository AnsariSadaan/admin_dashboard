<?php

namespace App\Controllers;


class Dashboard extends BaseController
{
    public function dashboard() {
        if (!$this->session->has('user')) {
            return redirect()->to('/login');
        }

        return view('home');
    }

    public function tables() {
        return view('tables');
    }
}
