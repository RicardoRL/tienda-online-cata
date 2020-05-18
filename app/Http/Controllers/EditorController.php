<?php

namespace App\Http\Controllers;

use App\Editor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  dd();
      return view('layouts_editor.editorMenu');

      //dd(\Auth::guard('editor')->id());
      //return view('layouts_editor.editorInicioContenido');

      //dd(\Auth::guard('editor')->id());
      //return view('layouts_editor.editorInicioContenido');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts_editor.editorCreate');
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
            'nombre' => 'required|max:50',
            'apepat' => 'required|max:50',
            'apemat' => 'required|max:50',
            'fecnac' => 'required',
            'correo' => 'required|min:5|max:100',
            'password' => 'required|min:8',
        ]);

        $data=$request->all();

        Editor::create([
            'nombre' => $data['nombre'],
            'apepat' => $data['apepat'],
            'apemat' => $data['apemat'],
            'fecnac' => $data['fecnac'],
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
        ]);
  
        return redirect()->route('editor.index')->with([
            'editorCreado'=>'Has agregado a un Editor exitosamente',
            'clase-alerta'=>'alert-success',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editor = Editor::findOrFail($id);
        return view ('layouts_editor.editorShow', compact('editor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editor = Editor::findOrFail($id);
        return view ('layouts_editor.editorEdit', compact('editor'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $entrada=$request->all();
         $editor = Editor::findOrFail($id);
         $editor->update($entrada);
        return redirect()->route('editor.index')->with([
            'editorUpdate'=>'Has actualizado correctamente al editor ',
            'clase-alerta'=>'alert-info',
            ]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editor = Editor::findorFail($id);

        $editor->delete();

        return redirect()->route('editor.index')->with([
            'editorDelete'=>'Se ha eliminado el editor correctamente',
            'clase-alerta'=>'alert-danger',
        ]);
    }
}
