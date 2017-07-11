<?php
namespace app\admin\controller;
use think\Controller;
class ProductCategory extends Controller
{
    public function index()
    {
        return $this ->fetch('product_category');
	}
}
