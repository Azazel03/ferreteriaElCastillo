<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products' => Products::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create',['categories' => Categories::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        if ($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $imagen = $file->getClientOriginalName();
            $file->move(public_path().'/img/',$imagen);
        }else{
            $imagen = ".-";
        }
        DB::select("SET @p0='".$request->get('name')."'");
        DB::select("SET @p1='".$request->get('description')."'");
        DB::select("SET @p2='".(int)$request->get('neto')."'");
        DB::select("SET @p3='".$imagen."'");
        DB::select("SET @p4='".$request->get('stock')."'");
        DB::select("SET @p5='".(int)$request->get('categoria')."'");
        DB::select('CALL setProducts(@p0, @p1, @p2, @p3, @p4, @p5, @6)');
        DB::select('SELECT @p0 AS nombre, @p1 AS description, @p2 AS neto, @p3 AS image, @p4 AS stock, @p5 AS idcategory, @6 AS statusResponse');
        return view('products.index',['products' => Products::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Products::where('idproduct','=',$id)->get();
        foreach($producto as $product){
            $categoria = $product->idcategory;
        }
        return view('products.show',['products' => $producto, "category" => Categories::where('idcategory','=',$categoria)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit',['product' => Products::where('idproduct','=',$id)->get()->first(),'categorias' => Categories::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        /*if ($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $imagen = $file->getClientOriginalName();
            $file->move(public_path().'/img/',$imagen);
        }else{
            $imagen = DB::table('products')->where('idproduct','=',$id)->value('image');
        }
        DB::select("SET @p0='".$id."'");
        DB::select("SET @p1='".$request->get('name')."'");
        DB::select("SET @p2='".$request->get('description')."'");
        DB::select("SET @p3='".(int)$request->get('neto')."'");
        DB::select("SET @p4='".$imagen."'");
        DB::select("SET @p5='".(int)$request->get('stock')."'");
        DB::select("SET @p6='".(int)$request->get('categoria')."'");
        DB::select("SET @p7='".$request->get('status_product')."'");
        DB::select('CALL putProducts(@p0, @p1, @p2, @p3, @p4, @p5, @6, @7, @8)');
        DB::select('SELECT @p0 AS idprod, @p1 AS nombre, @p2 AS descriptions, @p3 AS value_neto, @p4 AS images, @p5 AS stockStore, @6 AS idcategories, , @7 AS status_prod, @8 AS statusResponse');*/
        //return view('products.index',['products' => Products::all()]);
        //return redirect('admin/products');
        echo "llego";
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
