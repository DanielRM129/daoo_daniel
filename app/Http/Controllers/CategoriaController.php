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

    public function update(Request $request, $id)
    {
        $updatedCategoria = $request->all();
        $categoria = Categoria::find($id);
        $categoria->nome = $updatedCategoria['nome'];
        $categoria->imagem = $updatedCategoria['imagem'];
        if(!$categoria->save())
            dd("Erro ao atualizar a categoria $id !");
        return redirect('/categorias');
    }

    public function edit($id)
    {
        $dados = ['categoria' => Categoria::find($id)];
        return view('categoria_edit', $dados);
    }

    public function delete($id)
    {
        // if(Categoria::find($id)->delete())
        //     return redirect('/categorias');
        // else dd($id);
        return view('categoria_remove',['categoria' => Categoria::find($id)]);

    }

    public function remove(Request $request, $id)
    {
        if($request->confirmar==="Deletar")
        if(!Categoria::destroy($id))
            dd("Erro ao deletar a categoria $id !");
        return redirect('/categorias');
    }
}
