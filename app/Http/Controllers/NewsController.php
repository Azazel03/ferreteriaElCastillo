<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\Theme;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $new
     * @param  int  $theme
     * @return \Illuminate\Http\Response
     */
    public function setVisit($news,$theme){
        DB::select("SET @p0='$news'");
        DB::select("SET @p1='$theme'");
        DB::select('CALL setVisit(@p0, @p1)');
        DB::select('SELECT @p0 AS news, @p1 AS theme');
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $this->setVisit(0,0);
        $news = News::where('estado','S')->get();
        $theme = Theme::where('estado','S')->get();
        $banner = News::where('inicio','S')->get();
        $data = ['news' => $news,'theme' => $theme, 'banner' => $banner];
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }    
}
