<?php

namespace app\common\model;

use think\Model;
use think\facade\Cache;
use app\lib\exception\BaseException;
class User extends Model
{
    //发送验证码
    public function sendCode(){
        // 获取用户提交的手机号码
        $phone = request()->param('phone');
        // 判断是否发送过验证码
        if(Cache::get($phone))throw new BaseException(['code'=>200,'msg'=>'你操作得太快了','errorCode'=>30001]);
        // 生成4位验证码
        $code = random_int(100000,999999);
        // 发送验证码
        // $res = AlismsController::SendSMS($phone,$phone);
        // 发送成功 写入缓存
        // if($res['Code']=='ok') return Cache::set($phone,$phone,config('api.alisms.expire'));
        // 模拟发送验证码
        // if(!config('api.alisms.isopen')){
        // }
        Cache::set($phone,$code,60);
        throw new BaseException(['code'=>200,'msg'=>'验证码：'.$code,'errorCode'=>30005]);
        // 发送失败 抛出异常
        throw new BaseException(['code'=>200,'msg'=>'发送失败','errorCode'=>30004]);
        // 存储验证码
        Cache::set('13175006852','123456',60);
        // 检测/获取验证码

    }
}
