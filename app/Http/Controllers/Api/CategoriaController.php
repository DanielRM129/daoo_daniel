<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Composer\Command\ExecCommand;
use Exception;

class CategoriaController extends Controller
{
    public function index()
    {
        return response()->json(Categoria::all());
    }

    public function show($id)
    {
        try{
            return response()->json(Categoria::findOrFail($id));
        } catch (\Exception $error) {
        $responseError = [
            'Erro' => "A categoria com id: $id não foi encontrada!",
            'Exception' => $error->getMassage(),
        ];
        $statusHttp = 404;
        return response()->json($responseError, $statusHttp);
        }
    }

    public function store(Request $request)
    {
        try {
            $newCat = $request->all();
            $storedCat = Categoria::create($newCat);
            return response()->json([
                'msg'=> 'Categoria inserida com sucesso!',
                'categoria'=>$storedCat
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir nova categoria!",
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
            $newCat = Categoria::findOrFail($id);
            $newCat->update($data);
            return response()->json([
                'msg'=> 'Categoria atualizada com sucesso!',
                'categoria'=>$newCat
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao atualizar categoria!",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function remove($id)
    {
        try{
            $deletedCat = destroy($id);
            //$deletedCat = Categoria::findOrFail($id)
            return $response->json([
                'Message'=>"Categoria com id:$id removido!"
            ]);
        } catch (\Exception $error) {
        $responseError = [
            'Erro' => "Erro ao excluir categoria!",
            'Exception' => $error->getMassage(),
        ];
        $statusHttp = 404;
        return response()->json($responseError, $statusHttp);
        }
    }
}
