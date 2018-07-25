<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function marcas()
    {
    	return view('marcas');
    }
}
