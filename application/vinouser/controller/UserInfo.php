<?php
namespace app\vinouser\controller;
use app\vinouser\model\User;
use think\Request;
class Test
{
    public function login($phone,$password)
    {
		//$phone=$request->get('phone');
		//$password=$request->get('password');
		$output = array();
		if(empty($phone)||empty($password)){
			$output = array('data'=>NULL, 'info'=>'请填写参数名', 'code'=>-401);
			echo(json_encode($output));
			return;
		}
		$user = new User;
		$result=user::login($phone,$password);
		$output = array('data'=>current($result), 'info'=>'success!', 'code'=>-0);
		echo(json_encode($output));
        return;
	}
	 public function getUserInfo(Request $request)
    {
		$output = array();
		if(empty($phone)&&empty($id)){
			$output = array('data'=>NULL, 'info'=>'请填写参数名', 'code'=>-401);
			echo(json_encode($output));
			return;
		}else if(!empty($phone)){
			$user = new User;
			$result=user::getUserInfoByPhone($phone);
			$output = array('data'=>current($result), 'info'=>'success!', 'code'=>-0);
		}else if(!empty($id)){
			$user = new User;
			$result=user::getUserInfoById($id);
			$output = array('data'=>current($result), 'info'=>'success!', 'code'=>-0);
		}
		echo(json_encode($output));
        return;
	}
	/**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->get('phone'))){
             //传param，使get搜索分页带参数
			$list = Db::query('select * from vino_user where phone=?',[$request->get('phone')]);
			dump($list);
        }
    }
	  /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }
	 /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->post();
        $model = new ArticleModel($data);
        if (false === $model->validate(true)->allowField(true)->save($data)){
            return $this->error($model->getError());
        }
        return $this->success('新增成功');
    }
    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $data = ArticleModel::get($id);
        $this->fetch('',compact('data'));
    }
    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = ArticleModel::get($id);
        $this->fetch('',compact('data'));
    }
    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->post();
        $model = new ArticleModel();
        if (false === $model->validate(true)->allowField(true)->save($data,['id' => $id])){
            return $this->error($model->getError());
        }
        return $this->success('修改成功');
    }
    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $data = ArticleModel::destroy($id);
        if ($data){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}
