<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Composer\Command\ExecCommand;
use Exception;

class AreaController extends Controller
{
    public function index()
    {
        return response()->json(Area::all());
    }

    public function show($id)
    {
        try{
            return response()->json(Area::findOrFail($id));
        } catch (\Exception $error) {
        $responseError = [
            'Erro' => "A Area com id: $id não foi encontrada!",
            'Exception' => $error->getMassage(),
        ];
        $statusHttp = 404;
        return response()->json($responseError, $statusHttp);
        }
    }

    public function store(Request $request)
    {
        try {
            $newArea = $request->all();
            $storedArea = Area::create($newArea);
            return response()->json([
                'msg'=> 'Area inserida com sucesso!',
                'area'=>$storedArea
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir nova Area!",
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
            $newArea = Area::findOrFail($id);
            $newArea->update($data);
            return response()->json([
                'msg'=> 'Area atualizada com sucesso!',
                'area'=>$newArea
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao atualizar Area!",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function remove($id)
    {
        try{
            $deletedArea = destroy($id);
            //$deletedArea = Area::findOrFail($id)
            return $response->json([
                'Message'=>"Area com id:$id removida!"
            ]);
        } catch (\Exception $error) {
        $responseError = [
            'Erro' => "Erro ao excluir Area!",
            'Exception' => $error->getMassage(),
        ];
        $statusHttp = 404;
        return response()->json($responseError, $statusHttp);
        }
    }
}
