<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\Menu\MenuService;
class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index(Request $request, $id, $slug = ''){
        $menu = $this->menuService->getId($id);
        $products = $this->menuService->getProduct($menu);
        return view('menu', [
            'title' =>$menu->name,
            'product' => $products,
            'menu' => $menu
        ]); 
    }
}
