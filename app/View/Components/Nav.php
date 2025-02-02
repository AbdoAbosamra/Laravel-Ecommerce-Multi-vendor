<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Nav extends Component
{
    public $items;
    public $active;


    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->items= config('nav');
        $this->active = Route::currentRouteName(); // to get the current route name of the smae request we have
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav');
    }
}
