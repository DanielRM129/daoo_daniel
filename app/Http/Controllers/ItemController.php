<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function index()
    {
        $itensList = $this->item->all();
        return view('itens',[
            "itens"=>$itensList
        ]);
        //  return response()->json($itensList);
    }

    public function show($id)
    {
        $itensList = $this->item->find($id);
        // return response()->json($itensList);
        return view('show',[
            "item"=>$itensList
        ]);
    }

    public function store(Request $request)
    {
        $novoItem = $request->all();

        if (Item::create($novoItem))
            return redirect('/itens');
        else
            dd("Erro ao inserir novo usuário !");
    }

    public function create(){
        return view('item_create');
    }

    public function update(Request $request, $id)
    {
        $updatedItem = $request->all();
        $item = Item::find($id);
        $item->nome = $updatedItem['nome'];
        $item->descricao = $updatedItem['descricao'];
        $item->imagem = $updatedItem['imagem'];
        if(!$item->save())
            dd("Erro ao atualizar o item $id !");
        return redirect('/itens');
    }

    public function edit($id)
    {
        $dados = ['item' => Item::find($id)];
        return view('item_edit', $dados);
    }

    public function delete($id)
    {
        // if(Item::find($id)->delete())
        //     return redirect('/itens');
        // else dd($id);
        return view('item_remove',['item' => Item::find($id)]);

    }

    public function remove(Request $request, $id)
    {
        if($request->confirmar==="Deletar")
        if(!Item::destroy($id))
            dd("Erro ao deletar o item $id !");
        return redirect('/itens');
    }
}
