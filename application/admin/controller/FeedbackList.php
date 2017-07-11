<?php
namespace app\admin\controller;
use think\Controller;
class FeedbackList extends Controller
{
    public function index()
    {
        return $this ->fetch('feedback_list');
	}
}
