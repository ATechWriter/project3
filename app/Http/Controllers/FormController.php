<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormController extends Controller
{
    /**
    * Show two forms
    *
    * @return Illuminate\Http\Response
    */

    public function index()
    {
        return view('index');
    }
}
