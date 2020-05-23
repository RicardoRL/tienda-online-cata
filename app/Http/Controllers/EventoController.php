<?php

namespace App\Http\Controllers;
use App\Evento;
use App\Editor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{

  public function owner()
    {
      
    }

  public function view()
  {
      
  }


    public function index()
    {
      $eventos = Evento::all();
      //$this->authorize('pass', $eventos);
      
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      return view('layouts_evento.eventoIndex', compact('eventos', 'admin'));
    }

    public function create()
    {
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      return view('layouts_evento.eventoNuevo', compact('admin'));
    }

    public function store(Request $request)
    {
     
        $this->validate($request, [
            'nombre' => 'required|min:10|max:30',
            'sede' => 'required',
            'fecha' => 'required',
            'asistentes' => 'required',
            'imagen' => 'required',
          ]);

        $entrada=$request->all();

        if($request->hasFile('imagen'))
        {
            $files = $request->file('imagen');
            $str = strtolower($request->nombre);
            $nombreEvento = str_replace(" ", "_",$str);
            $nombreEvento = "/img/eventos/".$nombreEvento;
            $entrada['imagen']=$nombreEvento;

            foreach($files as $file){
            //Storage::put($file->getClientOriginalName(), file_get_contents($file));
            $nombre = $file->getClientOriginalName();
            $file->move(public_path().$nombreEvento, $nombre);
            }
        }

        Evento::create($entrada);

        return redirect()->route('editor.index')
                ->with([
                    'alerta'=>'Has creado correctamente un nuevo evento ',
                    'clase-alerta'=>'alert-success',
                    ]);
     }

    public function update(Request $request, $id)
    {
        $entrada=$request->all();
        if($request->hasFile('imagen'))
        {
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            $file->move(public_path().'/img/eventos', $nombre);
            $entrada['imagen']=$nombre;
        }
        
        $evento = Evento::findOrFail($id);

        $evento->update($entrada);
        return redirect()->route('evento.index')->with([
            'eventoActualizacion'=>'Has actualizado correctamente el evento ',
            'clase-alerta'=>'alert-info',
            ]);
    }

  /*  public function show($id)
    {
        $evento = Evento::findOrFail($id);
        return view ('layouts_evento.eventoShow', compact('evento'));
    }
*/
    public function edit($id)
    {
      $evento = Evento::findOrFail($id);
     // $this->authorize('pass', $eventos);
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      return view ('layouts_evento.eventoEdit', compact('evento', 'admin'));
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        
        $evento->delete();

        return redirect()->route('editor.index')->with([
            'eventoDelete'=>'Has eliminado el evento correctamente ',
            'clase-alerta'=>'alert-danger',
            ]);
    }

    public function deleteList()
    {
      $eventos = Evento::all();
      //$this->authorize('pass', $eventos);
      
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      
      
      return view('layouts_evento.eventoDelete',compact('eventos', 'admin'));
    }

    public function delete($id)
    {
      $evento = Evento::findOrFail($id);
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      return view('layouts_evento.eventoShow',compact('evento', 'admin'));
    }

    public function scopeName(Request $request){
      $nombre = $request->buscar;
      $eventos = Evento::where('nombre', 'LIKE', "%$nombre%")->get();
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      return view('layouts_evento.eventoIndex',compact('eventos', 'admin'));
    }

    public function scopeDelete(Request $request){
      $nombre = $request->buscar;
      $eventos = Evento::where('nombre', 'LIKE', "%$nombre%")->get();
      $editor_id = \Auth::guard('editor')->user()->id;
      $admin = Editor::where('id', $editor_id)->first();
      return view('layouts_evento.eventoDelete',compact('eventos', 'admin'));
    }
}
