<?php

namespace App\View\Components\Koordinator;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KoordinatorLayout extends Component
{
    public $web;
    /**
     * Create a new component instance.
     */
    public function __construct($web)
    {
        $this->web = $web;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.koordinator.koordinator-layout', $this->web);
    }
}
