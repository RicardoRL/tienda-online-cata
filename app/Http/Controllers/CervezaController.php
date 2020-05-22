<?php

namespace App\Http\Controllers;

use App\Cerveza;
use App\Editor;
use App\Cerveceria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\session;

class CervezaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scopeName(Request $request){
        $nombre = $request->buscar;
        $cervezas = Cerveza::where('nombre', 'LIKE', "%$nombre%")->get();
        $editor_id = \Auth::guard('editor')->user()->id;
        $admin = Editor::where('id', $editor_id)->first();
        return view('layouts_cervezas.cervezasUpdate',compact('cervezas', 'admin'));
      }

    public function index(Request $request)
    {
       // dd($request->get('buscar'));
        $cervezas = Cerveza::name($request->get('cervezas'));
        return view('layouts_cervezas.cervezasUpdate',compact('cervezas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cervecerias = Cerveceria::all()->pluck('nombre', 'id');
        $editor_id = \Auth::guard('editor')->user()->id;
        $admin = Editor::where('id', $editor_id)->first();
        return view('layouts_cervezas.cervezasCreate', compact('cervecerias', 'admin'));
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
            'cerveceria_id' => 'required',
            'nombre' => 'required|min:10',
            'estilo' => 'required|min:10',
            'aspecto' => 'required|min:10',
            'sabor_aroma' => 'required|min:10',
            'alcohol' => 'required',
            'temp_consumo' => 'required',
            'maridaje' => 'required|min:10',
            'presentacion' => 'required|min:10',
            'precio' => 'required',
            'cantidad' => 'required',
            'imagen' => 'required',
        ]);
        $entrada=$request->all();
    
            
        if($request->hasFile('imagen'))
        {
            //$cervecerias = DB::table('cerveceria')->get();
            $tipo = $request->nombre;
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            $cervecerias = DB::table('cervecerias')->get();
            //$cervecerias = Cerveceria::all()->pluck('nombre', 'id');
            foreach ($cervecerias as $micerveceria){
                if($request->cerveceria_id == $micerveceria->id){

                    //$nombre_cerveceria = $micerveceria->nombre;
                    //echo($micerveceria->nombre);
                    $str = strtolower($micerveceria->nombre);
                    // Str::lower($micerveceria->nombre);
                    $stri = str_replace(" ", "_",$str);
                    //   return ($stri);

                    $file->move(public_path().'/img/imagenes_Cervezas/'.$request->tipo.'/'.$stri.'/', $nombre);
                    $ruta = "/img/imagenes_Cervezas/".$request->tipo.'/'.$stri.'/'.$nombre;
                    $entrada['imagen'] = $ruta;
                    $save = $ruta;
                   // return ($save);
                    Cerveza::Create($entrada);
                    return redirect()->route('editor.index')
                            ->with([
                        'cervezaCreate' => 'Se ha agregado una nueva cerveza con exito',
                        'clase-alerta' => 'alert-success',
                    ]);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function show(Cerveza $cerveza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cervecerias = Cerveceria::all()->pluck('nombre', 'id');
        $cerveza = Cerveza::findOrFail($id);
        $editor_id = \Auth::guard('editor')->user()->id;
        $admin = Editor::where('id', $editor_id)->first();
        return view ('layouts_cervezas.cervezasEdit', compact('cerveza', 'cervecerias', 'admin'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cerveza $cerveza)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cerveza $cerveza)
    {
        //
    }

    public function updateList()
    {
      $cervezas = Cerveza::all();
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      return view('layouts_cervezas.cervezasUpdate',compact('cervezas', 'admin'));
    }

    public function deleteList()
    {
      $cervezas = Cerveza::all();
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();

      //Aquí solo cambia cervezasUpdate por cervezasDelete
      return view('layouts_cervezas.cervezasUpdate',compact('cervezas', 'admin'));
    }
}
