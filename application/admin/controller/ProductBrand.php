<?php
namespace app\admin\controller;
use think\Controller;
class ProductBrand extends Controller
{
    public function index()
    {
        return $this ->fetch('product_brand');
	}
}
