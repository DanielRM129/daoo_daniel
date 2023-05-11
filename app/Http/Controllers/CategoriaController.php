<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $categoria;

    public function __construct()
    {
        $this->categoria = new Categoria();
    }

    public function index()
    {
        $categoriasList = $this->categoria->all();
        return view('categorias',[
            "categorias"=>$categoriasList
        ]);
        //  return response()->json($categoriasList);
    }

    public function show($id)
    {
        $categoriasList = $this->categoria->find($id);
        // return response()->json($categoriasList);
        return view('show',[
            "categoria"=>$categoriasList
        ]);
    }

    public function store(Request $request)
    {
        $novoCategoria = $request->all();

        if (Categoria::create($novoCategoria))
            return redirect('/categorias');
        else
            dd("Erro ao inserir novo usuário !");
    }

    public function create(){
        return view('categoria_create');
    }
}
