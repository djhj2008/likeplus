<?php /* Smarty version Smarty-3.1.6, created on 2018-03-08 13:21:06
         compiled from "E:/amp/Apache24/htdocs/likeplus/Home/View\Login\register.html" */ ?>
<?php /*%%SmartyHeaderCode:88175aa0c842eb2f80-64449185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2ce40da4fd3622c6af8823624d733c6b9e05dae' => 
    array (
      0 => 'E:/amp/Apache24/htdocs/likeplus/Home/View\\Login\\register.html',
      1 => 1520409655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88175aa0c842eb2f80-64449185',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa0c842f4049',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa0c842f4049')) {function content_5aa0c842f4049($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="viewport" content="height=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
    <title></title>
    <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
common.css?version=1.01.03"/>
    <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
register.css?version=1.01.03"/>
</head>
<body>
    <div class="register">
        <div class="regTop">
            <span>用户注册</span>
            <a class="back" href="index.html">&lt;&nbsp;返回</a>
        </div>
        <div class="content">
            <div class="point">
                <span>注册成功后，手机号为登录账号。</span>
            </div>
            <form action="">
                <div class="message">
                    <input type="tel" placeholder="输入手机号" pattern="[0-9]{11}" required/>
                    <input type="password" placeholder="请输入6-25位密码" pattern="[0-9A-Za-z]{6,25}" required/>
                    <input type="password" placeholder="请再次输入密码" pattern="[0-9A-Za-z]{6,25}" required/>
                    <input type="text" placeholder="推荐人手机号" pattern="[0-9]{6}" required/>
                    <!--select name="job">
                        <option value="choose">选择职位</option>
                        <option value="boss">老板</option>
                        <option value="staff">员工</option>
                    </select-->
                    
                    <div class="icons">
                        <b><img src="<?php echo @AIMAGE_URL;?>
zc-1.jpg" alt=""/></b>
                        <b><img src="<?php echo @AIMAGE_URL;?>
zc-2.jpg" alt=""/></b>
                        <b><img src="<?php echo @AIMAGE_URL;?>
zc-3.jpg" alt=""/></b>
                        <b><img src="<?php echo @AIMAGE_URL;?>
zc-1.jpg" alt=""/></b>
                    </div>
                    <!--a class="code" href="" required>获取验证码</a-->
                </div>
                <div class="agree">
                    <input type="checkbox"/><span>&nbsp;同意&nbsp;</span><a href="">《注册协议》</a>
                </div>
                <button class="submit" type="submit">注册</button>
            </form>
        </div>
    </div>
</body>
</html><?php }} ?>