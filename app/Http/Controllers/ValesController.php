<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Symfony\Component\VarDumper\Cloner\Data;

class ValesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DB::table('empresa')->get()->pluck('nombre', 'id')->dd();
        
        //Con estas 2 lineas sacabamos los atributos de empresa, id sin modelos
        //$empresa = DB::table('empresa')->get()->pluck('nombre', 'id');
        //return view('vales.create')->with('empresa', $empresa);

        //Con modelos
        $empresas=Empresa::all(['id', 'nombre']);
        return view('vales.create')->with('empresa', $empresas);
                
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd ($request->all());
        $data= $request->validate([
            'empresa'=> 'required',
            'novales'=> 'required',
            'desde'=> 'required',
            'hasta'=> 'required',
            'importeuni'=> 'required',
            'prelitro'=> 'required',
            'referencia'=> 'required',
            'date'=> 'required',
            'item'=> 'required'
        ]);

        DB::table('vales')->insert([
            'empresa_id'=>$data['empresa'],
            'item_id'=>1,
            'novales'=>$data['novales'],
            'desde'=>$data['desde'],
            'hasta'=>$data['hasta'],
            'importeuni'=>$data['importeuni'],
            'prelitro'=>$data['prelitro'],
            'contador'=> $data['novales'],
            'obs'=>$data['referencia'],
            'date'=>$data['date']
        ]);
        return redirect()->action('ValesController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
