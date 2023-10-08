<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $breadcrumbs = [];

    public function shareBreadcrumbs()
    {
        View::share('breadcrumbs', $this->breadcrumbs);
    }

    protected function addBreadcrumbItem($title, $href)
    {
        $this->breadcrumbs[] = [
            'title' => $title,
            'href' => $href,
        ];
        $this->shareBreadcrumbs();
    }
}
