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
                $asideBar = view('OLEGYERA.adm.layouts.aside.global')->render();
                break;
        };
        return view('OLEGYERA.adm.template.adm_index')
            ->with([
                'header' => view('OLEGYERA.adm.layouts.header')->with(['header_var' => $this->header])->render(),
                'aside' => $asideBar,
                'content' => $this->content,
                'footer' => view('OLEGYERA.adm.layouts.footer')->render(),
                'is_auth' => $this->is_auth,
            ]);
    }
}
