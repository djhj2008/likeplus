<?php /* Smarty version Smarty-3.1.6, created on 2018-03-11 14:37:32
         compiled from "D:/amp/Apache24/htdocs/likeplus/Home/View\Login\login.html" */ ?>
<?php /*%%SmartyHeaderCode:163185aa1490dd28cd4-70723452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca906b85098d1850d0aac2782503ade74be03e45' => 
    array (
      0 => 'D:/amp/Apache24/htdocs/likeplus/Home/View\\Login\\login.html',
      1 => 1520695750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163185aa1490dd28cd4-70723452',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa1490dd89e6',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa1490dd89e6')) {function content_5aa1490dd89e6($_smarty_tpl) {?><!DOCTYPE html>
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
        <footer class="footer text-right">
            Copyright &copy; 2018.爱加社区
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