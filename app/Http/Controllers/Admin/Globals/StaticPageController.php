<?php

namespace App\Http\Controllers\Admin\Globals;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequet;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use App\CatgoryImage;
use App\Slider;
use App\Page;
use App\Menu;
use Illuminate\Support\Facades\Auth;
class StaticPageController extends BaseController

{
    protected $header = [['title' => 'Адмін Панель', 'link' => 'global_dashboard'], ['title' => 'Статичні Сторінки', 'link' => 'global_dashboard']];
    protected $aside = 'Global';


    public function showMain(){
        $img_one = CatgoryImage::where('type', 1)->first();
        $img_two = CatgoryImage::where('type', 2)->first();
        $sliders = Slider::all();
        $this->content = view(env('VIEW_PATH') . 'adm.staticpages.main.show')->with([
            'img_one' => $img_one,
            'img_two' => $img_two,
            'sliders' => $sliders,
        ])->render();
        return $this->renderPage();
    }

    public function editCatsImage(CategoryRequet $request){
        if($request->type == 1){
            $img = CatgoryImage::where('type', 1)->first();
        }
        else{
            $img = CatgoryImage::where('type', 2)->first();
        }
        unlink(storage_path('app/public/static/' . $img->path));
        $img->path = $request->type . '_' . $request->image->getClientOriginalName();
        $request->image->move(storage_path('app/public/static/'),  $img->path);
        $img->save();
        return redirect()->route('global_show_main');
    }

    public function addSliderImage(SliderRequest $request){
        $slider = new Slider;
        $slider->path = $request->slider->getClientOriginalName();
        $request->slider->move(storage_path('app/public/slider/'),  $slider->path);
        $slider->save();
        return redirect()->route('global_show_main');
    }

    public function deleteSliderImage($id){
        $slider = Slider::where('id', $id)->first();
        unlink(storage_path('app/public/slider/' . $slider->path));
        $slider->delete();
        return redirect()->route('global_show_main');
    }

    public function showAll(){
        $pages = Page::paginate(25);
        $this->content = view(env('VIEW_PATH') . 'adm.pages.show')->with([
            'pages' => $pages,
        ])->render();
        return $this->renderPage();
    }

    public function createPage(PageRequest $request){
        if ($request->isMethod('post')) {
            $data = [];
            if(isset($request->image)){
                $data['image'] = $request->alias . '_' . $request->image->getClientOriginalName();
                $request->image->move(storage_path('app/public/images/'), $data['image']);
            }
            $data['title'] = $request->title;
            $data['alias'] = $request->alias;
            $data['text'] = $request->text;
            $data['menu'] = $request->menu;
            $data['user_id'] = Auth::user()->id;
            if (isset($request->show)) {
                $data['show'] = 1;
            }else{
                $data['show'] = 0;
            }
            $page_new = Page::create($data);
            return redirect()->route('global_edit_page', $page_new->alias);
        }
        $this->content = view(env('VIEW_PATH') . 'adm.pages.create')->with(['menus' => $this->getMenu()])->render();
        return $this->renderPage();
    }


    public function editPage(PageRequest $request, $alias){
        $page = Page::where('alias', $alias)->first();
        if ($request->isMethod('post')) {
            $data = [];
            if(isset($request->image)){
                if($page->image != null){
                    unlink(storage_path('app/public/images/' . $page->image));
                }
                $page->image = $request->alias . '_' . $request->image->getClientOriginalName();
                $request->image->move(storage_path('app/public/images/'), $page->image);
            }
            if($page->title != $request->title){
                $page->title = $request->title;
                $page->alias = $request->alias;
            }

            if($page->text != $request->text){
                $page->text = $request->text;
            }

            if($request->show == 'on'){
                $page->show = 1;
            }else{
                $page->show = 0;
            }
            $page->menu = $request->menu;
            $page->save();
            return redirect()->route('global_edit_page', ['alias' => $page->alias]);
        }
        $this->content = view(env('VIEW_PATH') . 'adm.pages.edit')->with(['page' => $page, 'menus' => $this->getMenu()])->render();
        return $this->renderPage();
    }

    protected function uploadFile(PageRequest $request){
        $path = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(storage_path('app/public/images/'), $path);
        return response()->json(asset('storage/images/' . $path));
    }

    protected function getMenu(){
        $menu = $this->getChild(0);
        return $menu;
    }

    protected function getChild($id){
        $menus = Menu::where('parent', $id)->get();
        if(!empty($menus)){
            $global_menu_array = [];
            $menu_array = [];
            foreach ($menus as $menu){
                $child = $this->getChild($menu->id);
                array_push($menu_array, ['parent' => $menu, 'child' => $child]);
            }
            array_push($global_menu_array, $menu_array);
            return $menu_array;
        }
        return false;
    }
}
