<?php

class Upload
{
    /*作者：mckee 来自：www.phpddt.com*/
    public $upload_name;                    //上传文件名
    public $upload_tmp_name;                //上传临时文件名
    public $upload_final_name;                //上传文件的最终文件名
    public $upload_target_dir;                //文件被上传到的目标目录
    public $upload_target_path;                //文件被上传到的最终路径
    public $upload_filetype;                //上传文件类型
    public $allow_uploadedfile_type;        //允许的上传文件类型
    public $upload_file_size;                //上传文件的大小
    public $allow_uploaded_maxsize = 10000000;    //允许上传文件的最大值

    //构造函数
    public function __construct()
    {
        $this->upload_name = $_FILES["file"]["name"]; //取得上传文件名
        $this->upload_filetype = $_FILES["file"]["type"];
        $this->upload_tmp_name = $_FILES["file"]["tmp_name"];
        $this->allow_uploadedfile_type = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'doc', 'zip', 'rar', 'txt', 'wps');
        $this->upload_file_size = $_FILES["file"]["size"];
        $this->upload_target_dir = "./upload";
    }

    //文件上传
    public function upload_file()
    {
        $upload_filetype = $this->getFileExt($this->upload_name);
        if (in_array($upload_filetype, $this->allow_uploadedfile_type))
        {
            if ($this->upload_file_size < $this->allow_uploaded_maxsize)
            {
                if (!is_dir($this->upload_target_dir))
                {
                    mkdir($this->upload_target_dir, 0777, true);
                    chmod($this->upload_target_dir, 0777);
                }
                $this->upload_final_name = date("YmdHis") . rand(0, 100) . '.' . $upload_filetype;
                $this->upload_target_path = $this->upload_target_dir . "/" . $this->upload_final_name;
                if (!move_uploaded_file($this->upload_tmp_name, $this->upload_target_path))
                    echo "<font color=red>文件上传失败！</font>";
            } else
            {
                echo("<font color=red>文件太大,上传失败！</font>");
            }
            return $this->upload_target_path;
        } else
        {
            echo("不支持此文件类型，请重新选择");
        }
    }

    /*
     * 上传图片数组
     */
    public function file_arr()
    {
        foreach ($_FILES['img'] as $k => $v)
        {
            if ($k == 'name')
            {
                foreach ($v as $key => $item)
                {
                    $arr[$key]['name'] = $item;
                }
            }
            if ($k == 'type')
            {
                foreach ($v as $key => $item)
                {
                    $arr[$key]['type'] = $item;
                }
            }
            if ($k == 'tmp_name')
            {
                foreach ($v as $key => $item)
                {
                    $arr[$key]['tmp_name'] = $item;
                }
            }
            if ($k == 'size')
            {
                foreach ($v as $key => $item)
                {
                    $arr[$key]['size'] = $item;
                }
            }
        }
        foreach ($arr as $item)
        {
            $this->upload_name = $item["name"]; //取得上传文件名
            $this->upload_filetype = $item["type"];
            $this->upload_tmp_name = $item["tmp_name"];
            $this->upload_file_size = $item["size"];
            $img[] = $this->upload_file();
        }
        return $img;
    }


    /**
     *获取文件扩展名
     * @param String $filename 要获取文件名的文件
     */
    public function getFileExt($filename)
    {
        $info = pathinfo($filename);
        return $info["extension"];
    }

}