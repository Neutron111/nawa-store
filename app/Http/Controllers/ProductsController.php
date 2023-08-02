<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;
use PDO;

class ProductsController extends Controller
{
    public function index(){

    }
    public function show($slug){
        $product =Product::active()
        ->withoutGlobalScope('owner')
        ->where('slug','=',$slug)
        ->firstorFail();
        $gallery = ProductImage::where('product_id', '=', $product->id)->get(); // بدي الصور فقط الخاصة بالمنتج هاد

        return view('shop.products.show',[
            'product'=>$product,
            'gallery' => $gallery,
        ]);
    }
}
