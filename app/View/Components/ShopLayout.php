<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShopLayout extends Component
{
    public $title;
    public $showBreadcumb;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title ,$showBreadcumb =true)
    {
        $this->title =$title;
        $this->showBreadcumb = $showBreadcumb;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.shop'
    );
    }
}
