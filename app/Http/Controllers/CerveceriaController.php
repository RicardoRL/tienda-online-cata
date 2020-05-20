<?php

namespace App\Http\Controllers;
use App\Editor;
use App\Cerveceria;
use App\Cerveza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CerveceriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cerveceria = Cerveceria::all();

        return view('layouts_cerveceria.cerveceriaUpdate')->with(['cerveceria'=>$cerveceria]);
<<<<<<< HEAD
   
=======
>>>>>>> 0c0ec936a488bb4b5508ef81bcfcbc03837109a0
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts_cerveceria.cerveceriaCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:30',
            'ciudad' => 'required',
            'sitio_web' => 'required|max:30',
            'contacto' => 'required|max:30',
          //'imagen' => 'required',
        ]);

        $entrada=$request->all();
            /*
        if($request->hasFile('imagen'))
        {
            $tipo = $request->nombre;
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            $file->move(public_path().'/img/imagenes_Cervezas/'.$request->tipo.'/'.$request->nombre, $nombre);
            $entrada['imagen'] = $nombre;
        }
        */
        Cerveceria::Create($entrada);

        return redirect()->route('editor.index')
                ->with([
                    'cerveceriaCreate' => 'Se ha agregado una nueva cerveceria con exito',
                    'clase-alerta' => 'alert-success',
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cerveceria  $cerveceria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cerveceria = Cerveceria::findOrFail($id);
        return view ('layouts_cerveceria.cerveceriaShow', compact('cerveceria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cerveceria  $cerveceria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cerveceria = Cerveceria::findOrFail($id);
        return view ('layouts_cerveceria.cerveceriaEdit', compact('cerveceria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cerveceria  $cerveceria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entrada=$request->all();
        /*
        if($request->hasFile('imagen'))
        {
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            $file->move(public_path().'/img/eventos', $nombre);
            $entrada['imagen']=$nombre;
        }
        */
        $cerveceria = Cerveceria::findOrFail($id);

        $cerveceria->update($entrada);
        return redirect()->route('cerveceria.index')->with([
            'cerveceriaUpdate'=>'Has actualizado correctamente los datos cerveceria ',
            'clase-alerta'=>'alert-info',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cerveceria  $cerveceria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cerveceria = Cerveceria::findOrFail($id);
        
        $cerveceria->delete();

        return redirect()->route('editor.index')->with([
            'cerveceriaDelete'=>'Has eliminado la cerveceria correctamente ',
            'clase-alerta'=>'alert-danger',
            ]);
    }
}
