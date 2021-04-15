<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    public function getMunicipios(Request $request){
        $request->validate([
            'id_provincia'=>['required', 'integer'],
        ]);
        $municipios = Municipio::where(['id_provincia'=>$request->id_provincia])->pluck('municipio', 'id');
        $data = [
            'getMunicipios'=>$municipios,
        ];  
        return view('ajax.getMunicipios', $data); 
    }
}