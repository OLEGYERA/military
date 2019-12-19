<?php

namespace App\Http\Controllers\Admin\Globals;

use Illuminate\Http\Request;
use App\Menu;
use App\Http\Controllers\Admin\BaseController;

class MenuController extends BaseController
{
    protected $header = [['title' => 'Адмін Панель', 'link' => 'global_dashboard'], ['title' => 'Статичні Сторінки', 'link' => 'global_dashboard']];
    protected $aside = 'Global';


    public function manageMenu(Request $request){
        $this->content = view(env('VIEW_PATH') . 'adm.menu.manage')->with([
            'menus' => $this->getMenu(),
        ])->render();
        return $this->renderPage();
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

    public function addMenu(Request $request){
        $menu = new Menu();
        $menu->parent = $request->parent;
        $menu->drop = 1;
        $menu->name = $request->name;
        $menu->alias = $request->alias;
        $menu->save();
        return redirect()->route('global_manage_menu');
    }

    public function editMenu(Request $request, $id){
        $cur_menu = Menu::where('id', $id)->first();
        if ($request->isMethod('post')) {
            $cur_menu->parent = $request->parent;
            $cur_menu->name = $request->name;
            $cur_menu->alias = $request->alias;
            $cur_menu->save();
            return redirect()->route('global_manage_menu');
        }
        $this->content = view(env('VIEW_PATH') . 'adm.menu.edit')->with([
            'menus' => $this->getMenu(),
            'cur_menu' => $cur_menu,
        ])->render();
        return $this->renderPage();
    }

    public function deleteMenu($id){
        $menu = Menu::where('id', $id)->first();
        $menu->delete();
        return redirect()->route('global_manage_menu');
    }
}
