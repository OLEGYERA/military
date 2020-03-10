<?php

namespace App\Http\Controllers\Admin\Globals;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class DashboardController extends BaseController
{
    protected $header = [['title' => 'Админ Панель', 'link' => 'global_dashboard']];
    protected $aside = 'Global';

    public function start(){

        return $this->renderPage();
    }
}
