<?php
namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login'); // your login form view
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Replace these with your actual credentials
        $adminUsername = 'admin';
        $adminPassword = 'yenadminq';

        if ($username === $adminUsername && $password === $adminPassword) {
            $session = session();
            $session->set([
                'isLoggedIn' => true,
                'username' => $username
            ]);

            return redirect()->to(base_url('editcontent')); // redirect to admin dashboard
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}