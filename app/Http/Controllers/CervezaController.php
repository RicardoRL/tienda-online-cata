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

      public function scopeDelete(Request $request){
        $nombre = $request->buscar;
        $cervezas = Cerveza::where('nombre', 'LIKE', "%$nombre%")->get();
        $editor_id = \Auth::guard('editor')->user()->id;
        $admin = Editor::where('id', $editor_id)->first();
        return view('layouts_cervezas.cervezasDelete',compact('cervezas', 'admin'));
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
        $estilo = getEstilos();
        $total = count($estilo);
       
        $cervecerias = Cerveceria::all()->pluck('nombre', 'id');
        $editor_id = \Auth::guard('editor')->user()->id;
        $admin = Editor::where('id', $editor_id)->first();
        return view('layouts_cervezas.cervezasCreate', compact('cervecerias', 'admin', 'estilo', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'cerveceria_id' => 'required',
            'nombre' => 'required',
            'estilo' => 'required',
            'aspecto' => 'required',
            'sabor_aroma' => 'required',
            'alcohol' => 'required',
            'temp_consumo' => 'required',
            'maridaje' => 'required',
            'presentacion' => 'required',
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
                    //$save = $ruta;
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
    public function show($id)
    {
        $estilo = getEstilos();
        $total = count($estilo);
        $cervecerias = Cerveceria::all()->pluck('nombre', 'id');
        $cerveza = Cerveza::findOrFail($id);
        $editor_id = \Auth::guard('editor')->user()->id;
        $admin = Editor::where('id', $editor_id)->first();
        return view ('layouts_cervezas.cervezasShow', compact('cerveza', 'cervecerias', 'admin', 'estilo', 'total'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estilo = getEstilos();
        $total = count($estilo);
       
        $cervecerias = Cerveceria::all()->pluck('nombre', 'id');
        $cerveza = Cerveza::findOrFail($id);
        $editor_id = \Auth::guard('editor')->user()->id;
        $admin = Editor::where('id', $editor_id)->first();
        return view ('layouts_cervezas.cervezasEdit', compact('cerveza', 'cervecerias', 'admin', 'estilo', 'total'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $entrada=$request->all();
        $cerveza = Cerveza::findOrFail($id);

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
                   // $save = $ruta;
                   // return ($save);
                  
                   $cerveza->update($entrada);
                   return redirect()->route('cerveza.updateList')->with([
                       'cervezaUpdate'=>'Has actualizado correctamente los datos cerveza ',
                       'clase-alerta'=>'alert-info',]);
                }
            }
        }
        else{
                    $cerveza->update($entrada);
                   return redirect()->route('cerveza.updateList')->with([
                       'cervezaUpdate'=>'Has actualizado correctamente los datos cerveza ',
                       'clase-alerta'=>'alert-info',]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cerveza  $cerveza
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cerveza = Cerveza::findOrFail($id);
      
        $cerveza->delete();

      return redirect()->route('cerveza.deleteList')->with([
          'cervezaDelete'=>'Has eliminado la cerveza correctamente ',
          'clase-alerta'=>'alert-danger',
      ]);
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
      return view('layouts_cervezas.cervezasDelete',compact('cervezas', 'admin'));
    }
}
