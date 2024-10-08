<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectosController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $proyectos = DB::table('proyectos')->get();
    return view('projects.index', ['proyectos' => $proyectos]);
  }


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('projects.new');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Proyectos::create($request->all());
    return redirect('projects')->with('success', 'Proyecto creado satisfactoriamente');
  }

  /**
   * Display the specified resource.
   */
  public function show(Proyectos $proyectos)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $proyectos = Proyectos::findOrFail($id);
    return view('projects.update', compact('proyectos'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'titulo' => 'required',
      'descripcion' => 'required'
    ]);
    $proyectos = Proyectos::findOrFail($id);
    $proyectos->update($request->all());
    return redirect()->route('projects.index')->with('success', 'Proyecto actualizado correctamente');
  }

  /**
   * Remove the specified resource from storage.
  //  * @param  int  $id
  //  * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $proyectos = Proyectos::findOrFail($id);
    $proyectos->delete();
    return redirect()->route('projects.index')->with('success', 'Proyecto eliminado correctamente.');
  }
}
