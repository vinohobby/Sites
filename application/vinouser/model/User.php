<?php
namespace app\vinouser\model;
use Think\Db;
use app\vinouser\model\Base;

class User extends Base{
	//protected $table = 'vino_user';
	public static function login($phone,$password){
		$user=Db::query('select * from vino_user where phone=? and password=?',[$phone,$password]);
		return $user;
	}
	public static function getUserInfoByPhone($phone){
		$user=Db::query('select * from vino_user where phone=?',[$phone]);
		return $user;
	}
	public static function getUserInfoById($id){
		$user=Db::query('select * from vino_user where id=?',[$id]);
		return $user;
	}
	public static function register($phone,$password){
		$user=new User;
		$user->data([
			'phone'  =>  $phone,
			'password' =>  $password
			]);
		$user->save();
		
	}
	public static function updateInfo($obj){
		$id=$obj['id'];
		$phone=&obj['phone'];
		$ninckname=$obj['nickname'];
		$password=&obj['password'];
		$headerpath=&obj['headerpath'];
		$location=$obj['location'];
		$sex=$obj['sex'];
		$sql='';
		$set='set ';
		if(empty($nickname)&&empty($password)&&empty($headerpath)&&empty($location)){
			return;
		}else if(!empty($nickname)){
		}else if(!empty($password)){
		}else if(!empty($headerpath)){
		}else if(!empty($location)){
		}
		if(empty($id)&&empty($phone)){
			return;
		}else if(!empty($id)){
			$sql="update think_user set name=:name where id=$id";
		}else if(!empty($phone)){
			$sql="update think_user set name=:name where phone=$phone";
		}
		Db::table('vino_user')
			->where()
			->whereOr()
			->update(['name' => 'thinkphp','id'=>1]);
	}
}	
 ?>