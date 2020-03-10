<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Page;
use Auth;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasicController extends Controller
{
    protected $lang = null;


    protected $template = 'main.index';
    protected $content = false;
    protected $lastModified = false;
    protected $title;
    protected $is_main;
    // seo description
    protected $description_default_seo;
    protected $vars;
    protected $css = null;
    protected $jss = null;
    protected $aside = null;
    protected $block = null;
    protected $slider = null;
    protected $seo = null;
    protected $loc = '';
    protected $background = false;
    protected $targeting_url = null;
    // set last segment
    protected $last_segment = null;
    protected $module_price_section = null;

    //twitter meta tags
    protected $twitter_tags = null;


    public function renderBasic()
    {
        $this->vars = Arr::add($this->vars, 'header', view('OLEGYERA.front.components.header')->with('menus', $this->getChild(0))->render());
        $this->vars = Arr::add($this->vars, 'is_main', $this->is_main);
        $this->vars = Arr::add($this->vars, 'aside', $this->aside);
        $this->vars = Arr::add($this->vars, 'content', $this->content);



        // add twitter tags to vars array
//        $this->vars = Arr::add($this->vars, 'twitter_tags', $this->twitter_tags);
//
//        $this->vars = Arr::add($this->vars, 'title', $this->title);
//        // add array of seo description from protected field
//        $this->vars = Arr::add($this->vars,'description_default_seo',$this->description_default_seo);
//        $this->vars = Arr::add($this->vars, 'jss', $this->jss);
//        $this->vars = Arr::add($this->vars, 'css', $this->css);
//        $this->vars = Arr::add($this->vars, 'targeting_url', $this->targeting_url);
//        $this->vars = Arr::add($this->vars, 'footer', view('OLEGYERA.FrontBox.COMPONENTS.footer_' . $this->lang)->render());
//
//        if(\Route::currentRouteName() != 'first_page.start.ru'){
//
//        }
//
//
//        if ($this->content) {
//            $this->vars = Arr::add($this->vars, 'content', $this->content);
//        }
////
////        if ($this->background) {
////            $this->vars = Arr::add($this->vars, 'background', $this->background);
////        }
////
//        $branding = view('layouts.banners.branding')->with(['ar_key'=>$this->targeting_url])->render();
//        $this->vars = Arr::add($this->vars, 'branding', $branding);

        return view('OLEGYERA.front.template.basicBlade')->with($this->vars);
    }


    protected function getChild($id){
        $menus = Menu::where('parent', $id)->get();
        if(!empty($menus)){
            $global_menu_array = [];
            $menu_array = [];
            foreach ($menus as $menu){
                $child = $this->getChild($menu->id);
                array_push($menu_array, ['parent' => $menu, 'page' => Page::where('menu', $menu->id)->get(), 'child' => $child]);
            }
            array_push($global_menu_array, $menu_array);
            return $menu_array;
        }
        return false;
    }


    protected function getLatestAlias($str){
        $lastAlias = explode('/', $str);
        return array_pop($lastAlias);
    }

    protected function getFirstAlias($str){
        $firstAlias = explode('/', $str);
        if(count($firstAlias) - 1 >= 1){
            return $firstAlias[1];
        }else{
            return $firstAlias[0];
        }

    }


}
