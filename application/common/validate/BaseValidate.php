<?php
namespace app\common\validate;
use think\Validate;
use app\lib\exception\BaseException;

class BaseValidate extends Validate
{
    public function goCheck($scene = false){
        // 获取用户传递过来的数据
        $params = request()->param();
        // 开始验证 
        $check = $scene ? $this->scene($scene)->check($params) : $this->check($params);
        if(!$check){
            throw new BaseException(['msg'=>$this->getError(),'errorCode'=>400,'code' => 400],);
        };
        return true;
    }
}
