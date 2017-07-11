<?php
namespace app\admin\controller;
use think\Controller;
class MemberDel extends Controller
{
    public function index()
    {
        return $this ->fetch('member_del');
	}
}
