<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected  $header = null;
    protected  $content = null;
    protected  $aside = null;
    protected  $is_auth = false;


    public function renderPage(){
        $asideBar = null;
        switch($this->aside){
            case 'Global':
                $asideBar = view(env('VIEW_PATH') . 'adm.layouts.aside.global')->render();
                break;
        };
        return view(env('VIEW_PATH') . 'template.adm_index')
            ->with([
                'header' => view(env('VIEW_PATH') . 'adm.layouts.header')->with(['header_var' => $this->header])->render(),
                'aside' => $asideBar,
                'content' => $this->content,
                'footer' => view(env('VIEW_PATH') . 'adm.layouts.footer')->render(),
                'is_auth' => $this->is_auth,
            ]);
    }
}
