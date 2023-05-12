<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function index()
    {
        $usuariosList = $this->usuario->all();
        return view('usuarios',[
            "usuarios"=>$usuariosList
        ]);
        //  return response()->json($usuariosList);
    }

    public function show($id)
    {
        $usuariosList = $this->usuario->find($id);
        // return response()->json($usuariosList);
        return view('show',[
            "usuario"=>$usuariosList
        ]);
    }

    public function store(Request $request)
    {
        $novoUsuario = $request->all();

        // $usuario = new Usuario;
        // $array_input_request = $request->all();
        // $usuario->fill($array_input_request);

        // $usuario->nome = $request->nome;
        // $usuario->email = $request->email;
        // $usuario->senha = $request->senha;
        // $usuario->imagem = $request->imagem;
        // $usuario->status = $request->status;

        // if ($usuario->save())
        //     return redirect('/usuarios');
        // else
        //     dd("Erro ao inserir novo usuário !");

        if (Usuario::create($novoUsuario))
            return redirect('/usuarios');
        else
            dd("Erro ao inserir novo usuário !");
    }

    public function create(){
        return view('usuario_create');
    }

    public function update(Request $request, $id)
    {
        $updatedUser = $request->all();
        $usuario = Usuario::find($id);
        $usuario->nome = $updatedUser['nome'];
        $usuario->email = $updatedUser['email'];
        $usuario->senha = $updatedUser['senha'];
        $usuario->imagem = $updatedUser['imagem'];
        if(!$usuario->save())
            dd("Erro ao atualizar o usuário $id !");
        return redirect('/usuarios');
    }

    public function edit($id)
    {
        $dados = ['usuario' => Usuario::find($id)];
        return view('usuario_edit', $dados);
    }

    public function delete($id)
    {
        // if(Usuario::find($id)->delete())
        //     return redirect('/usuarios');
        // else dd($id);
        return view('usuario_remove',['usuario' => Usuario::find($id)]);
    }

    public function remove(Request $request, $id)
    {
        if($request->confirmar==="Deletar")
        if(!Usuario::destroy($id))
            dd("Erro ao deletar o usuário $id !");
        return redirect('/usuarios');
    }
}
