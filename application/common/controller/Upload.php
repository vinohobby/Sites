<?php
namespace app\common\controller;
use think\File;
class Upload{
 public function upload(Request $request)
    {
        var_dump($_FILES);
        // 获取表单上传文件
        $files = $request->file('file');
        $item = []; {
            // 移动到框架应用根目录/public/uploads/ 目录下并且设置不覆盖
        foreach ($files as $file )
            $info = $file->validate()->move(ROOT_PATH . 'runtime' . DS . 'uploads', '', true, false);
            if ($info) {
                $item[] = $info->getRealPath();
            } else {
                // 上传失败获取错误信息
                $this->error($file->getError());
            }
        }
        // die();
        $this->success('文件上传成功'.implode('<br/>',$item));
    }
};
?>