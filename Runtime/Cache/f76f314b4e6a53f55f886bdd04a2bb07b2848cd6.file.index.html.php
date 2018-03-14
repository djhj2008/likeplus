<?php /* Smarty version Smarty-3.1.6, created on 2018-03-11 14:37:30
         compiled from "D:/amp/Apache24/htdocs/likeplus/Home/View\Login\index.html" */ ?>
<?php /*%%SmartyHeaderCode:8655aa14907bd36a3-26194969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f76f314b4e6a53f55f886bdd04a2bb07b2848cd6' => 
    array (
      0 => 'D:/amp/Apache24/htdocs/likeplus/Home/View\\Login\\index.html',
      1 => 1520695759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8655aa14907bd36a3-26194969',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa14907dad57',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa14907dad57')) {function content_5aa14907dad57($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head lang="en">
<title>爱加社区</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title></title>
    <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
common.css?version=1.01.03"/>
    <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
login.css?version=1.01.03"/>
    <style>
        .login_bg{
            background: #ffffff;
        }
        .login_btn{
            width: 80%;
            margin: 10%;
        }
        .other_login{
            top: 70%;
        }
        .other_choose{
            top: 80%;
        }
    </style>
</head>
<body>
<div class="login_bg">
    <div id="logo">
        <img src="<?php echo @AIMAGE_URL;?>
logo.png" alt=""/>
    </div>
    <a class="login_btn" href="<?php echo @__CONTROLLER__;?>
/login">登&nbsp;&nbsp;录</a>
    <a class="login_btn" href="<?php echo @__CONTROLLER__;?>
/register">注&nbsp;&nbsp;册</a>
    <!--div class="other_login">
        <div class="other"></div>
        <span>其他方式登录</span>
        <div class="other"></div>
    </div-->
    <!--div class="other_choose">
        <a href="">
            <img src="<?php echo @AIMAGE_URL;?>
qq.png" alt=""/>
        </a>
        <a href="">
            <img src="<?php echo @AIMAGE_URL;?>
wx.png" alt=""/>
        </a>
        <a href="">
            <img src="<?php echo @AIMAGE_URL;?>
wb.png" alt=""/>
        </a>
    </div-->
    <footer class="footer text-right">
        Copyright &copy; 2018.爱加社区
    </footer>
</div>
</body>
</html><?php }} ?>