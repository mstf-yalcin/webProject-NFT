<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class companyController extends Controller
{
    //
    public function about()
    {
      return view('company/about');
    }

    public function contact()
    {
      return view('company/contact');
    }

    public function policy()
    {
      return view('company/policy');
    }
  
    public function support()
    {
      return view('company/support');
    }

    public function term()
    {
      return view('company/term');
    }

    public function connect()
    {
      return view('company/connect');
    }

    public function maintanance()
    {
      return view('company/maintanance');
    }

    public function soon()
    {
      return view('company/soon');
    }
}
