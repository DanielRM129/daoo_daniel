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
            dd("Erro ao inserir novo usuário !");
    }

    public function create(){
        return view('area_create');
    }
}
