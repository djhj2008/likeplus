<?php /* Smarty version Smarty-3.1.6, created on 2018-03-08 13:28:18
         compiled from "E:/amp/Apache24/htdocs/likeplus/Home/View\Login\login.html" */ ?>
<?php /*%%SmartyHeaderCode:59385aa0c2dee8e496-55922394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3fa0903c4d78c1c953c9aea1d2eb40148c96dd6' => 
    array (
      0 => 'E:/amp/Apache24/htdocs/likeplus/Home/View\\Login\\login.html',
      1 => 1520486890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59385aa0c2dee8e496-55922394',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa0c2df0a038',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa0c2df0a038')) {function content_5aa0c2df0a038($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title></title>
    <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
common.css?version=1.01.05"/>
    <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
login.css?version=1.01.05"/>
    <style>
        .login_bg{
            background: #ffffff;
        }
    </style>
</head>
<body>
    <div id="login"></div>
    <div class="login_bg">
        <div id="logo">
            <img src="<?php echo @AIMAGE_URL;?>
logo.png" alt=""/>
        </div>
        <form action="" onSubmit="return chkinput(this)" method="post">
            <div class="userName">
                <lable>用户名：</lable>
                <input type="text" name="name" placeholder="请输入用户名" />
            </div>
            <div class="passWord">
                <lable>密&nbsp;&nbsp;&nbsp;码：</lable>
                <input type="password" name="password" placeholder="请输入密码" />
            </div>
            <div class="choose_box">
                <div>
                    <input type="checkbox" checked="checked" name="checkbox"/>
                    <lable>记住密码</lable>
                </div>
                <!--a href="newPassword.html">忘记密码</a-->
            </div>
            <button class="login_btn" type="submit">登&nbsp;&nbsp;录</button>
        </form>
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
		<footer class="other_login">
		    2018-2019  Loving family. - AiJia.com
		</footer>
    </div>
</body>
</html>
<script>
  function chkinput(form){
    if(form.name.value==""){
      alert('请输入手机号.');
      form.name.select();
      return(false);
    }

    if(form.password.value==""){
      alert('请输入密码.');
      form.password.select();
      return(false);
    }
    return(true);
  }
</script><?php }} ?>