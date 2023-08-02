<?php

namespace App\View\Components;
use App\Models\Product;

use Illuminate\View\Component;

class TredndingProducts extends Component
{

    public $products;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title ='Trending  Products',$count = 3)
    {
    $this->title =$title;
    $this->products = Product::withoutGlobalScope('owner')

        ->active()
        ->latest('updated_at')
        ->take($count) //limit(8)
        ->get();
}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trednding-products');
    }
}
