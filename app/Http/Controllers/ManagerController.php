<?php
namespace App\Http\Controllers;

class ManagerController extends Controller
{
    public function dashboard()
    {
        return view('manager.dashboard');
    }
}