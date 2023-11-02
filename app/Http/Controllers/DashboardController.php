<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

      $data['header_title'] = 'Dashboard';

      return view('admin.dashboard', $data);
    }
}
