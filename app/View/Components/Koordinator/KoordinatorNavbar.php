<?php

namespace App\View\Components\Koordinator;

use App\Models\Tahun;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KoordinatorNavbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.koordinator.koordinator-navbar', [
            'tahuns' => Tahun::all(),
        ]);
    }
}
