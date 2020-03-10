<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Article;
use App\Page;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getArticles(){
        $articles = Article::where('show', 1)->get();
        return response()->json($articles);
    }

    protected function getMenu(){
        $menus = $this->getChild(0);
        return view('OLEGYERA.menu')->with(['menus' => $menus])->render();
    }

    protected function getPage($alais){
        return response()->json(Page::where('alias', $alais)->select('title','text', 'image')->first());
    }




    protected function getLastPages(){
        return response()->json(Page::where('show', 1)->orderBy('updated_at', 'asc')->select('title', 'image', 'alias')->paginate(10));
    }

    protected function getReserveNews(){
        return response()->json(Article::where('show', 1)->where('category', 1)->orderBy('updated_at', 'asc')->select('title', 'image', 'alias')->paginate(15));
    }

    protected function getInventoryNews(){
        return response()->json(Article::where('show', 1)->where('category', 2)->orderBy('updated_at', 'asc')->select('title', 'image', 'alias')->paginate(15));
    }

    protected function getReserveNew($alias){
        return response()->json(Article::where('alias', $alias)->first());
    }

    protected function getInventoryNew($alias){
        return response()->json(Article::where('alias', $alias)->first());
    }


}
