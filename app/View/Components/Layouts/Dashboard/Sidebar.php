<?php

namespace App\View\Components\Layouts\Dashboard;

use App\Repositories\MenuRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public Collection $_menus;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->_menus = MenuRepository::getAllTopLevelMenuWithChildren();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.dashboard.sidebar');
    }
}
