<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //SELECT  products.*, categories.name as category_name
        //from products
        //Inner join categories on categories.id = products.category_id


        ///************* the first way  */
        // $products = DB::table('products')
        // ->join('categories','categories.id','=','products.category_id')
        // ->select(
        //     ['products.*',
        //     'categories.name as category_name',]
        // )
        // ->get(); // to excute// return Collection object =array
        // return view('Admin/Products/index',[
        //     'title'=>"Products list",
        //     'products' => $products,

        // ]);
        ///************* the seocend way  */
        // $products =Product::join('categories','categories.id','=','products.category_id')
        // ->select(
        //     ['products.*',
        //     'categories.name as category_name',]
        // )

        // ->get(); // to excute// return Collection object =array



        $products = Product::all();
        return view('admin.products.index', [
            'title' => "Products list", // assositve array key,value
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();

        return view('admin.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();    /// object from model *** note we use model for model = table and import from database
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        $product->compare_price = $request->input('compare_price');
        $product->save();

        //prg: post redirect get
        return redirect()->route('Products.index'); //Get

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $product= Product::where('id', '=',$id)->first(); //return Model
        $product=Product::find($id); // same as before

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
