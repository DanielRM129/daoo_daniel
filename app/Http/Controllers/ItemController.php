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
}
