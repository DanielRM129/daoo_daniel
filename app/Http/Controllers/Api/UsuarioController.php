<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Composer\Command\ExecCommand;
use Exception;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(Usuario::all());
    }

    public function show($id)
    {
        try{
            return response()->json(Usuario::findOrFail($id));
        } catch (\Exception $error) {
        $responseError = [
            'Erro' => "O usuário com id: $id não foi encontrado!",
            'Exception' => $error->getMassage(),
        ];
        $statusHttp = 404;
        return response()->json($responseError, $statusHttp);
        }
    }

    public function store(Request $request)
    {
        try {
            $newUser = $request->all();
            $storedUser = Usuario::create($newUser);
            return response()->json([
                'msg'=> 'Usuário inserido com sucesso!',
                'usuario'=>$storedUser
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir novo usuário!",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $newUser = Usuario::findOrFail($id);
            $newUser->update($data);
            return response()->json([
                'msg'=> 'Usuário atualizado com sucesso!',
                'usuario'=>$newUser
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao atualizar usuário!",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function remove($id)
    {
        try{
            //$deletedUser = destroy($id);
            $deletedUser = Usuario::findOrFail($id)->delete();
            return response()->json([
                'Message'=>"Usuário com id:$id removido!"
            ]);
        } catch (\Exception $error) {
        $responseError = [
            'Erro' => "Erro ao excluir usuário!",
            'Exception' => $error->getMassage(),
        ];
        $statusHttp = 404;
        return response()->json($responseError, $statusHttp);
        }
    }
}
