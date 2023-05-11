<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use Illuminate\Http\Request;
use Composer\Util\Http\Response;


class ProdutoController extends Controller
{
    private $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function index()
    {
        $produtosList = $this->produto->all();
        return view('produtos',[
            "produtos"=>$produtosList
        ]);
        //  return response()->json($produtosList);
    }

    public function show($id)
    {
        $produtosList = $this->produto->find($id);
        // return response()->json($produtosList);
        return view('show',[
            "produto"=>$produtosList
        ]);
    }
}
