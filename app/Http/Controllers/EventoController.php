<?php

namespace App\Http\Controllers;
use App\Evento;
use App\Editor;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $evento = Evento::all();

        return view('layouts_evento.eventoIndex')->with(['evento'=>$evento]);
        return view('layouts_evento.eventoIndex',compact('evento'));
    }

    public function create()
    {
        return view('layouts_evento.eventoNuevo');
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
            $file = $request->file('imagen');
            $nombre = $file->getClientOriginalName();
            $file->move(public_path().'/img/eventos', $nombre);
            $entrada['imagen']=$nombre;
        }

        Evento::create($entrada);

        return redirect()->route('editor.index')
                ->with([
                    'alerta'=>'Has creado correctamente un nuevo evento ',
                    'clase-alerta'=>'alert-success',
                    ]);
       /* $id2 = 0;
        foreach($entrada as $mientrada){
            $id2 = $id2 + 1;
            if($mientrada->id == $id2 )
             {
                $mientrada->id = $id2;
                
             }
        }*/
        
        
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
        return view ('layouts_evento.eventoEdit', compact('evento'));
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

}
