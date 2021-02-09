<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Http\Requests\ThemesRequest;

class ThemesInterfacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('themes.index',['themes' => Theme::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemesRequest $request)
    {
        $categoria=new Theme();
        $categoria->name=$request->get('nombre');
        $categoria->description=$request->get('descripcion');
        $categoria->save();
        return redirect('admin/themes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Theme::where('id','=',$id)->get()->first();
        return view('themes.edit',['categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(ThemesRequest $request, $id)
    {
        $categoria=Theme::find($id);
        $categoria->name=$request->get('nombre');
        $categoria->description=$request->get('descripcion');
        $categoria->save();
        return redirect('admin/themes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        //
    }
}
