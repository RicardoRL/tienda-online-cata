<?php

namespace App\Http\Controllers;

use App\Domicilio;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomicilioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('layouts_cliente.clienteDomicilio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo_postal' => 'required|string|max:10',
            'estado' => 'required|string|max:30',
            'ciudad' => 'required|string|max:100',
            'colonia' => 'required|string|max:100',
            'calle_principal' => 'required|string|max:100',
            'num_ext' => 'nullable|numeric',
            'num_int' => 'nullable|numeric',
            'calle1' => 'required|string|max:100',
            'calle2' => 'required|string|max:100',
            'referencia' => 'nullable|string'
        ]);

        $domicilio = new Domicilio();

        $domicilio->cliente_id = \Auth::user()->id;
        $domicilio->codigo_postal = $request->codigo_postal;
        $domicilio->estado = $request->estado;
        $domicilio->ciudad = $request->ciudad;
        $domicilio->colonia = $request->colonia;
        $domicilio->calle_principal = $request->calle_principal;
        $domicilio->num_ext = $request->num_ext;
        $domicilio->num_int = $request->num_int;
        $domicilio->calle1 = $request->calle1;
        $domicilio->calle2 = $request->calle2;
        $domicilio->referencia = $request->referencia;
        
        $domicilio->save();
        //dd($domicilio->cliente_id);
        return redirect()->route('domicilio.show', $domicilio->cliente_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function show(int $cliente_id)
    {
        $domicilio_array = DB::table('domicilios')->where('cliente_id', $cliente_id)->get();
        $domicilio = new Domicilio();

        if(!empty($domicilio_array->all()))
        {
            $domicilio_array = DB::table('domicilios')->where('cliente_id', $cliente_id)->get()->toArray()[0];

            $domicilio->id = $domicilio_array->id;
            $domicilio->cliente_id = $domicilio_array->cliente_id;
            $domicilio->codigo_postal = $domicilio_array->codigo_postal;
            $domicilio->estado = $domicilio_array->estado;
            $domicilio->ciudad = $domicilio_array->ciudad;
            $domicilio->colonia = $domicilio_array->colonia;
            $domicilio->calle_principal = $domicilio_array->calle_principal;
            $domicilio->num_ext = $domicilio_array->num_ext;
            $domicilio->num_int = $domicilio_array->num_int;
            $domicilio->calle1 = $domicilio_array->calle1;
            $domicilio->calle2 = $domicilio_array->calle2;
            $domicilio->referencia = $domicilio_array->referencia;
        }
        //dd(isset($domicilio->id));
        return view('layouts_cliente.clienteDomicilio', compact('domicilio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function edit(Domicilio $domicilio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domicilio $domicilio)
    {
        $request->validate([
            'codigo_postal' => 'required|string|max:10',
            'estado' => 'required|string|max:30',
            'ciudad' => 'required|string|max:100',
            'colonia' => 'required|string|max:100',
            'calle_principal' => 'required|string|max:100',
            'num_ext' => 'nullable|numeric',
            'num_int' => 'nullable|numeric',
            'calle1' => 'required|string|max:100',
            'calle2' => 'required|string|max:100',
            'referencia' => 'nullable|string'
        ]);

        $domicilio->codigo_postal = $request->codigo_postal;
        $domicilio->estado = $request->estado;
        $domicilio->ciudad = $request->ciudad;
        $domicilio->colonia = $request->colonia;
        $domicilio->calle_principal = $request->calle_principal;
        $domicilio->num_ext = $request->num_ext;
        $domicilio->num_int = $request->num_int;
        $domicilio->calle1 = $request->calle1;
        $domicilio->calle2 = $request->calle2;
        $domicilio->referencia = $request->referencia;
        
        //dd($domicilio);
        $domicilio->save();

        return redirect()->route('domicilio.show', [$domicilio->cliente_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domicilio  $domicilio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domicilio $domicilio)
    {
        //
    }
}
