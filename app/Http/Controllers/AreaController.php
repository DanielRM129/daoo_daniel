<?php

namespace App\Http\Controllers;

use App\Models\Area;

use Illuminate\Http\Request;

class AreaController extends Controller
{
    private $area;

    public function __construct()
    {
        $this->area = new Area();
    }

    public function index()
    {
        $areasList = $this->area->all();
        return view('areas',[
            "areas"=>$areasList
        ]);
        //  return response()->json($areasList);
    }

    public function show($id)
    {
        $areasList = $this->area->find($id);
        // return response()->json($areasList);
        return view('show',[
            "area"=>$areasList
        ]);
    }

    public function store(Request $request)
    {
        $novoArea = $request->all();

        if (Area::create($novoArea))
            return redirect('/areas');
        else
            dd("Erro ao inserir nova área !");
    }

    public function create(){
        return view('area_create');
    }

    public function update(Request $request, $id)
    {
        $updatedUser = $request->all();
        $area = Area::find($id);
        $area->nome = $updatedUser['nome'];
        $area->descricao = $updatedUser['descricao'];
        $area->imagem = $updatedUser['imagem'];
        if(!$area->save())
            dd("Erro ao atualizar a área $id !");
        return redirect('/areas');
    }

    public function edit($id)
    {
        $dados = ['area' => Area::find($id)];
        return view('area_edit', $dados);
    }

    public function delete($id)
    {
        // if(area::find($id)->delete())
        //     return redirect('/areas');
        // else dd($id);
        return view('area_remove',['area' => Area::find($id)]);
    }

    public function remove(Request $request, $id)
    {
        if($request->confirmar==="Deletar")
        if(!Area::destroy($id))
            dd("Erro ao deletar a área $id !");
        return redirect('/areas');
    }
}
