<?php

namespace App\View\Components\Layouts\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\Component;

class PageHeader extends Component
{
    public string $lastBreadcrumbKey;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $breadcrumbs = array_keys(FacadesView::getShared()["breadcrumbs"]);
        $this->lastBreadcrumbKey = end($breadcrumbs);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.dashboard.page-header');
    }
}
