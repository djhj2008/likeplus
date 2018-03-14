<?php /* Smarty version Smarty-3.1.6, created on 2018-03-12 01:26:52
         compiled from "D:/amp/Apache24/htdocs/likeplus/Home/View\Sale\index.html" */ ?>
<?php /*%%SmartyHeaderCode:144865aa1497d1cebb0-35303779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf165da43a3283ea57db0118a408d411da7ee8c' => 
    array (
      0 => 'D:/amp/Apache24/htdocs/likeplus/Home/View\\Sale\\index.html',
      1 => 1520789104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144865aa1497d1cebb0-35303779',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa1497d36071',
  'variables' => 
  array (
    'salesname' => 0,
    'wares' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa1497d36071')) {function content_5aa1497d36071($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>爱加HOME购物平台</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/favicon.ico">
        <!-- App css -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/style.css?version=1.01.02" rel="stylesheet" type="text/css" />
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/modernizr.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
main.css?version=1.01.02" id="color-switcher-link">
        <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
animations.css">
        <link rel="stylesheet" href="<?php echo @ACSS_URL;?>
fonts.css">

    </head>
    <body>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="<?php echo @PUBLIC_ROOT_URL;?>
images/logo_title.png" alt="" height="50">
                        </span>
                        <i>
                            <img src="<?php echo @PUBLIC_ROOT_URL;?>
images/logo_sm.png" alt="" height="64">
                        </i>
                    </a>
                </div>
                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-user-o mr-0"></i> <span class="ml-1"><?php echo $_smarty_tpl->tpl_vars['salesname']->value;?>
<i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">欢迎!</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>个人信息</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-cog"></i> <span>设置</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-help"></i> <span>技术支持</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>退出登陆</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">爱加HOME</li>
                            <li>
                                <a href="<?php echo @__CONTROLLER__;?>
/index">
                                    <i class="fa fa-desktop"></i><span class="badge badge-danger badge-pill pull-right"></span> <span> 今日新品 </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-cart-plus"></i> <span> 购物 </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="buyware.html">今日订单</a></li>
                                    <li><a href="tables-datatable.html">历史订单</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-group"></i> <span> 我的群组 </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="userinfo.html">成员信息</a></li>
                                    <li><a href="tables-datatable.html">成员订单信息</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">更多内容</li>

                            <li>
                                <a href="#"><i class="fi-share"></i> <span> 开发中 </span> <span class="menu-arrow"></span></a>
                                <!--ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="javascript: void(0);">开发中 1.1</a></li>
                                    <li><a href="javascript: void(0);" aria-expanded="false">开发中 1.2 <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="javascript: void(0);">开发中 2.1</a></li>
                                            <li><a href="javascript: void(0);">开发中 2.2</a></li>
                                        </ul>
                                    </li>
                                </ul-->
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                <div class="ls section_padding_top_30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg">
                                <div class="page-about__title-wrapper">
                                    <h3 class="content-block__title"><span class="content-block__title-block"><span>今日新品</span></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ls section_padding_bottom_25">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul id="gallery_blog-carousel" class="gallery_item-carousel home-blog__carousel">
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                    <li>
                                        <div class="home-blog__carousel-wrapper">
                                            <figure class="home-blog__carousel-img">
                                                <a  href="#">
                                                    <img src="<?php echo @PUBLIC_ROOT_URL;?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['pic_url'];?>
" alt="">
                                                </a>
                                            </figure>
                                            <div class="post__content">
                                                <div class="post__meta">
                                                    <ul class="post__meta-list">
                                                        <li>
                                                            <div class="price">
                                                            <p  style="color:#959595"><del>零售价:￥<?php echo $_smarty_tpl->tpl_vars['v']->value['out_price'];?>
</del></p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="price">
                                                            <p  style="float:right;color:#0D4D78">订货价:￥<?php echo sprintf("%.02f",$_smarty_tpl->tpl_vars['v']->value['out_price']*0.88);?>
</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h3 class="post__title">
                                                    <a href="#" rel="bookmark"><?php echo $_smarty_tpl->tpl_vars['v']->value["name"];?>
</a>
                                                </h3>
                                                <div class="post__text-content">
                                                    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['info'];?>
</p>
                                                </div>

                                                <div class="shop-item__block ">
                                                    <a href="<?php echo @__APP__;?>
/sale/buyware?ware_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="shop-item__button">购买</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                </div>

                    <footer class="page_footer ds ms">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 footer-block__01 to_animate decoration__line_l offset_padding_top_90 offset_padding_bottom_85" >
                                    <div class="widget widget_text page-footer__logo">
                                        <p class="page-footer__logo-wrapper"><img src="<?php echo @PUBLIC_ROOT_URL;?>
images/logo_bottom.png" alt=""></p>
                                        <p>我们每天会由爱加HOME社交购物平台向您推荐3-4款产品.</p>
                                    </div>
                                    <div class="widget widget__payment">
                                        <h3 class="widget__payment-title">支付方式</h3>
                                        <div class="big">
                                            <a href="#"><i class="fa fa-cc-visa"></i></a>
                                            <a href="#"><i class="fa fa-wechat"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <footer class="footer text-right">
                        Copyright &copy; 2018.爱加社区
                    </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/popper.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/bootstrap.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/metisMenu.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/waves.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/counterup/jquery.counterup.min.js"></script>

        <!-- Chart JS -->
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/chart.js/chart.bundle.js"></script>

        <!-- init dashboard -->
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.core.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.app.js"></script>

        <script src="<?php echo @AJS_URL;?>
compressed.js"></script>
        <script src="<?php echo @AJS_URL;?>
main.js"></script>
    </body>
</html><?php }} ?>