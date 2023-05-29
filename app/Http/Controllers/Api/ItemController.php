<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Composer\Command\ExecCommand;
use Exception;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::all());
    }

    public function show($id)
    {
        try{
            return response()->json(Item::findOrFail($id));
        } catch (\Exception $error) {
        $responseError = [
            'Erro' => "O item com id: $id não foi encontrado!",
            'Exception' => $error->getMassage(),
        ];
        $statusHttp = 404;
        return response()->json($responseError, $statusHttp);
        }
    }

    public function store(Request $request)
    {
        try {
            $newItem = $request->all();
            $storedItem = Item::create($newItem);
            return response()->json([
                'msg'=> 'item inserido com sucesso!',
                'item'=>$storedItem
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir novo item!",
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
            $newItem = Item::findOrFail($id);
            $newItem->update($data);
            return response()->json([
                'msg'=> 'item atualizado com sucesso!',
                'item'=>$newItem
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao atualizar item!",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function remove($id)
    {
        try{
            $deletedItem = destroy($id);
            //$deletedItem = Item::findOrFail($id)
            return $response->json([
                'Message'=>"item com id:$id removido!"
            ]);
        } catch (\Exception $error) {
        $responseError = [
            'Erro' => "Erro ao excluir item!",
            'Exception' => $error->getMassage(),
        ];
        $statusHttp = 404;
        return response()->json($responseError, $statusHttp);
        }
    }
}
