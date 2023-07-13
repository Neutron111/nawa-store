<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\String_;

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
        $categories = Category::all();
        // return view('admin.products.create', compact('product', 'categories'));
        return view('admin.products.create', [
            'product' => $product,
            'categories' => $categories,
            'status_options' => Product::getstatusoptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image'); //return UplodedFile object
            $path = $file->store('uploads/images', 'public'); //return file path  -...>>>>> first parmeter for create file and name it ,the secoend for located disk
            $data['image'] = $path;
        }

        $product = Product::create($data);
        // this is mass assignment instaed of all below >>>>

        // $product = new Product();/// object from model *** note we use model for model = table and import from database
        // $product->name = $request->input('name');
        // $product->slug = $request->input('slug');
        // $product->category_id = $request->input('category_id');
        // $product->description = $request->input('description');
        // $product->short_description = $request->input('short_description');
        // $product->price = $request->input('price');
        // $product->compare_price = $request->input('compare_price');
        // $product->status = $request->input('status' ,'active'); /// the secened par for defualt value
        //$product->save();

        //prg: post redirect get
        return redirect()
            ->route('Products.index') //Get
            ->with('success', "Product ({$product->name}) Created"); //Add flash msg
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
    public function edit(Product $Product)
    {

        //عرفنا في البارميتر البروداكت عشان نستغني عن الجملة الثانية بدون ما نقعد نبحث عن id لارفل لحالها موفرة هاي الخاصية بمجرد تمرير البورداكات
        // $product = Product::findOrFail($id); يتم استدعاء هذا السطر عندما نعرف البارميتر


        // $product= Product::where('id', '=',$id)->first(); first return just one element //return Model
        // same as before
        // if (!$product){
        //     abort(404);
        // } to make it secure from hacker if he tried some tricks number on domain parameter
        // dd($Product);
        $categories = Category::all();
        $gallery =ProductImage::where('product_id','=',$Product->id)->get();// بدي الصور فقط الخاصة بالمنتج هاد 
        return view('admin.products.edit', [
            'product' => $Product,
            'categories' => $categories,
            'status_options' => Product::getstatusoptions(),
            'gallery'=> $gallery ,    // بعتناها هان عشان نفصل بينها وبين الكرييت
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $Product) // this parameter name is model binding
    {

        // $ruls =$this->rules($id);
        // $messages=$this->messages();
        // $request->validate($ruls,$messages);

        // $product = Product::findOrFail($id); //we dont need new product we need specfic id to update

        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/images', 'public');
            $data['image'] = $path;
        }
        $old_image =$Product->image;
        $Product->update($data);

        if ($old_image && $old_image != $Product->image){
            Storage::disk('public')->delete($old_image);
        }
        if($request->hasFile('gallery')) {
            //array of UploadedFile
            foreach($request->file('gallery') as $file){
                ProductImage::create([
                    'product_id'=>$Product->id,
                    'image' =>$file->store('uploads/images','public'),
                ]);
            }
        }


        // $product->name = $request->input('name');
        // $product->slug = $request->input('slug');
        // $product->category_id = $request->input('category_id');
        // $product->description = $request->input('description');
        // $product->short_description = $request->input('short_description');
        // $product->price = $request->input('price');
        // $product->compare_price = $request->input('compare_price');
        // $product->status = $request->input('status' ,'active');
        // $product->save();

        //prg: post redirect get
        return redirect()
            ->route('Products.index') //Get
            ->with('success', "Product ({$Product->name}) Updated"); //Add flash msg
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        // Product::where('id', '=', $id)->delete();  ///// first way to delete
        // Product::destroy($id);                     /////seocend way
        //  $product = Product::findOrFail($id);          ///// thired way
        $Product->delete();
        if ($Product->image) {
            Storage::disk('public')->delete($Product->image);
        }
        return redirect()
            ->route('Products.index') //Get
            ->with('success', "Product ({$Product->name}) Deleted"); //Add flash msg
    }
}
