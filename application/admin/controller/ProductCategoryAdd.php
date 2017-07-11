<?php
namespace app\admin\controller;
use think\Controller;
class ProductCategoryAdd extends Controller
{
    public function index()
    {
        return $this ->fetch('product_category_add');
	}
}
