<?php
/*
 * @thinkphp3.2.2  auth认证   php5.3以上
 * @Created on 2015/08/18
 * @Author  夏日不热(老屁)   757891022@qq.com
 * @如果需要公共控制器，就不要继承AuthController，直接继承Controller
 */
namespace Common\Controller;
use Think\Controller;
use Think\Auth;
use Think\Model;

//权限认证
class AuthController extends Controller {
	protected function _initialize(){
		//session不存在时，不允许直接访问
		if(!session('aid')){
			$this->error('还没有登录，正在跳转到登录页',U('Public/login'));
		}

		//session存在时，不需要验证的权限
		$not_check = array('Index/index','Index/main',
				'Index/clear_cache','Index/edit_pwd','Index/logout');

        //操作记录
        if(!empty($_POST)){
            $messages = [];
            foreach($_POST as $key=>$item){
                if(!in_array($key,['feiyong_shuoming','yuding_xvzhi','tuijian_liyou','guige','shuoming'])){
                    $messages[$key] = $item;
                }
            }
            $m= M("sys_log");
            $data = [];
            $data['uid'] = $_SESSION['aid'];
            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['controller'] = CONTROLLER_NAME.'/'.ACTION_NAME;
            $data['messages'] = json_encode($messages,JSON_UNESCAPED_UNICODE);
            $data['create_time'] = date('Y-m-d H:i:s',time());
            $m->add($data);
        }
		//当前操作的请求                 模块名/方法名
		if(in_array(CONTROLLER_NAME.'/'.ACTION_NAME, $not_check)){
			return true;
		}
		$auth = new Auth();
		if(!$auth->check(CONTROLLER_NAME.'/'.ACTION_NAME,session('aid')) && session('aid') != 1){
			$this->error('没有权限');
		}
        return true;
	}

    protected function display($templateFile='',$charset='',$contentType='',$content='',$prefix='') {
        parent::display($templateFile,$charset,$contentType,$content,$prefix);
    }

    protected function assign($name,$value='') {
        parent::assign($name,$value);
    }
}