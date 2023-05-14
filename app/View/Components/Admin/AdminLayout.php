<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
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
        return view('components.admin.admin-layout', $this->web);
    }
}
