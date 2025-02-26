<?php
namespace App\Http\Controllers;

class KokiController extends Controller
{
    public function dashboard()
    {
        return view('chef.dashboard');
    }
}