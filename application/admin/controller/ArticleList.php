<?php
namespace app\admin\controller;
use think\Controller;
class ArticleList extends Controller
{
    public function index()
    {
        return $this ->fetch('article_list');
	}
}
