<?php
header("content-type:text/html;charset=utf-8");
//设置模式
define('APP_DEBUG',true);//开发调试模式
//路径
define('ACSS_URL','/likeplus/Home/Public/css/');
define('JQPLOT','/likeplus/Home/Public/jqplot/');

define('LIKEPLUS','/likeplus/Home/');
define('AJS_URL','/likeplus/Home/Public/js/');
define('ABOOT_URL','/likeplus/Home/Public/bootstrap/');
define('ACK_URL','/likeplus/Home/Public/ckeditor/');
define('AIMAGE_URL','/likeplus/Home/Public/images/');
define('PUBLIC_ROOT_URL','/likeplus/Home/Public/');
define('SCWS_DICT_URL','/likeplus/Home/Public/dict/');
//引入tp框架的接口文件
include "./ThinkPHP/ThinkPHP.php";