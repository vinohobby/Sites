<?php
namespace app\admin\controller;
use think\Controller;
class MemberList extends Controller
{
    public function index()
    {
        return $this ->fetch('member_list');
	}
}
