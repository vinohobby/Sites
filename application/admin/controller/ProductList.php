<?php
namespace app\admin\controller;
use think\Controller;
class ProductList extends Controller
{
    public function index()
    {
        return $this ->fetch('product_list');
	}
}
