<?php

namespace App\Http\Controllers;
use App\Article;
use App\Page;
use App\Http\Controllers\BasicController;


class PageController extends BasicController
{
    protected $content = false;
    protected $is_main = false;


    public function homePage(){
        $this->is_main = true;
        $this->content = view('OLEGYERA.front.pages.home')->with('menus', $this->getChild(0))->render();
        return $this->renderBasic();
    }

    public function allPage($any){
        $alias = $this->getLatestAlias($any);

        $is_page = Page::where('alias', $alias)->first();
        if($is_page){
            $first_alias = $this->getFirstAlias($any);
            if($first_alias == 'training-of-frame-officers'){
                $aside_data = Article::whereIn('category', [0, 2])->orderBy('category', 2)->orderBy('updated_at', 'desc')->take(5)->get();
            }
            else{
                $aside_data = Article::whereIn('category', [0, 1])->orderBy('category', 1)->orderBy('updated_at', 'desc')->take(5)->get();
            }
            $this->aside = view('OLEGYERA.front.components.aside')->with(['data' => $aside_data, 'title' => 'Новини', 'menu_name' => $first_alias])->render();
            $this->content = view('OLEGYERA.front.components.text')->with('data', $is_page)->render();

        }else{
            $is_article = Article::where('alias', $alias)->first();
            if($is_article){
                $aside_data = Page::orderBy('updated_at', 'desc')->take(5)->get();
                $this->aside = view('OLEGYERA.front.components.aside')->with(['data' => $aside_data, 'title' => 'Останні Сторінки', 'menu_name' => ''])->render();
                $this->content = view('OLEGYERA.front.components.text')->with('data', $is_article)->render();
            }else{
                $first_alias = $this->getFirstAlias($any);
                $aside_data = Page::orderBy('updated_at', 'desc')->take(5)->get();
                if($first_alias == 'training-of-frame-officers'){
                    $this->aside = view('OLEGYERA.front.components.aside')->with(['data' => $aside_data, 'title' => 'Останні Сторінки', 'menu_name' => ''])->render();
                    $this->content = view('OLEGYERA.front.pages.main')->with('data',  Article::whereIn('category', [0, 2])->orderBy('category', 2)->orderBy('updated_at', 'desc')->get())->render();
                    return $this->renderBasic();
                }else{
                    $this->aside = view('OLEGYERA.front.components.aside')->with(['data' => $aside_data, 'title' => 'Останні Сторінки', 'menu_name' => ''])->render();
                    $this->content = view('OLEGYERA.front.pages.reverse')->with('data',  Article::whereIn('category', [0, 1])->orderBy('category', 1)->orderBy('updated_at', 'desc')->get())->render();
                    return $this->renderBasic();
                }

                abort(404);
            }
        }
        return $this->renderBasic();
    }




}
