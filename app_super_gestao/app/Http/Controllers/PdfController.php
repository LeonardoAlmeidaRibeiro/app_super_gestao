<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class PdfController extends Controller
{
    public function geraPdf(){
        $fornecedor = Fornecedor::all();
        dd( $fornecedor);
    }
}
