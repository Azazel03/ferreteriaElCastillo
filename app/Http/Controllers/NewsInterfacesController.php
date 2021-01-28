<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Theme;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NewsInterfacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index',['newspaper' => News::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create',['categorias' => Theme::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if ($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $imagen = $file->getClientOriginalName();
            $file->move(public_path().'/img/',$imagen);
        }else{
            $imagen = ".-";
        }
        $categoria = explode("_",$request->get('categoria'));
        DB::select("SET @p0='".$request->get('titulo')."'");
        DB::select("SET @p1='".$request->get('articulo')."'");
        DB::select("SET @p2='".$imagen."'");
        DB::select("SET @p3='".$categoria[0]."'");
        DB::select("SET @p4='".$categoria[1]."'");
        DB::select("SET @p5='".$request->get('inicio')."'");
        DB::select('CALL setNews(@p0, @p1, @p2, @p3, @p4, @p5)');
        DB::select('SELECT @p0 AS titulo, @p1 AS articulo, @p2 AS imagen, @p3 AS idcategoria, @p4 AS nombre_categoria, @p5 AS banner_inicio');
        return view('news.index',['newspaper' => News::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('news.show',['newspaper'=>News::where('id','=',$id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        #$noticia = News::where('id','=',$id)->get();
        #var_dump($noticia);
        return view('news.edit',['newspaper'=>News::where('id','=',$id)->get(),'categorias' => Theme::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        if ($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $imagen = $file->getClientOriginalName();
            $file->move(public_path().'/img/',$imagen);
        }else{
            $imagen = DB::table('news')->where('id','=',$id)->value('image');
        }
        $categoria = explode("_",$request->get('categoria'));
        DB::select("SET @p0='".$id."'");
        DB::select("SET @p1='".$request->get('titulo')."'");
        DB::select("SET @p2='".$request->get('articulo')."'");
        DB::select("SET @p3='".$imagen."'");
        DB::select("SET @p4='".$categoria[0]."'");
        DB::select("SET @p5='".$categoria[1]."'");
        DB::select("SET @p6='".$request->get('inicio')."'");
        DB::select('CALL putNews(@p0, @p1, @p2, @p3, @p4, @p5, @p6)');
        DB::select('SELECT @p0 AS idnews, @p1 AS titulo, @p2 AS articulo, @p3 AS imagen, @p4 AS idcategoria, @p5 AS nombre_categoria, @p6 AS banner_inicio');
        return view('news.index',['newspaper' => News::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
