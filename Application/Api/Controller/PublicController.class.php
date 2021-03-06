<?php
namespace Api\Controller;

/**
 * 用户相关接口
 */
use Common\Controller\BaseController;
use Common\Controller\IController;
use Common\Lib\DateUtils;
use Think\Controller;


/**
 * User登录
 */
class PublicController extends BaseController {

    /**
     *用户登录接口
     */
    public function login()
    {
        $telephone = IV('telephone','require');
        $password=IV('password','require');

        $user = D('Member')->getUserByUsernameAndPass($telephone,$password);
        if(!$user) {
            IE("手机号或密码错误",'');
        }
        $this->iSuccess($user,'member');
    }



    /**
     * 用户注册
     * @param null $username 用户名
     * @param null $email   邮箱
     * @param null $password 密码
     * Created by Dr.Chan<cynmsg@gmail.com>
     */
    public function register() {

        $password=IV('password','require');
        $repassword=IV('repassword','require');
        $data['telephone'] = IV('telephone','require');
        $varf=IV('varf','require');
        if($password != $repassword)
        {
            IE('两次密码不一样！');
        }
        $verify=D('Member')->verifySms(1,$data['telephone'],$varf);
        if(!$verify){
            IE('验证码不正确或已失效请重新获取');
        }
        $data['password'] = $password;
        $data['token'] = D('Member')->genToken();
        D('Member')->save($data);
        $this->iSuccess($data,'data');
    }


    /**
     * 获取验证码
     * @param string $telephone
     * @param string $type
     */
    public function getSmsVerify() {
        $where['telephone'] = IV('telephone','require');
        $type = IV('type','require');

        if($type==1){
            $member = D('Member')->getOneUser($where);
            if($member){
                IE("该手机号码已经绑定，请更换手机号再试");
            }
        }
        $tblname = 'sms';
        $where ['type'] = $type;
        $where ['status'] = 0;
        $time = NOW_TIME - 60 * 1;
        $where ['addtime'] = array (
            'gt',
            time_format ( $time )
        );
        $find = M ( $tblname )->where ( $where )->order ( 'id desc' )->find ();
        if ($find) {
            IE("请勿重复发送短信");
        } else {
            // 随机6位数字码
            $code = rand_str ( 6, 1 );
//			$send = api_send_sms ( $type, $telephone, $code );
            $telephone = $where['telephone'];
            $send=send_sms($telephone,$code);
            //$send =1;
            if ($send) {
                $data = array ();
                $data ['telephone'] = $telephone;
                $data ['type'] = $type;
                $data ['status'] = 0;
                $data ['code'] = $code;
                $add = M ( $tblname )->data ( $data )->add ();
                if (!$add) {
                    IE("发送短信失败，请重试！！");
                }
            } else {
                IE("发送短信失败，请重试！！");
            }
        }
        $this->iSuccess('','member');

    }
}