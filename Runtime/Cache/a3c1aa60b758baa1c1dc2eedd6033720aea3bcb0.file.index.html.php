<?php /* Smarty version Smarty-3.1.6, created on 2018-03-08 20:46:08
         compiled from "E:/amp/Apache24/htdocs/likeplus/Home/View\Sale\index.html" */ ?>
<?php /*%%SmartyHeaderCode:281395aa0ca0c050073-31610171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3c1aa60b758baa1c1dc2eedd6033720aea3bcb0' => 
    array (
      0 => 'E:/amp/Apache24/htdocs/likeplus/Home/View\\Sale\\index.html',
      1 => 1520512620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281395aa0ca0c050073-31610171',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa0ca0c31c3d',
  'variables' => 
  array (
    'salesname' => 0,
    'wares' => 0,
    'v' => 0,
    'devSelect' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa0ca0c31c3d')) {function content_5aa0ca0c31c3d($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>AiJia - Responsive Web App Kit</title>
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
assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/modernizr.min.js"></script>
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
assets/images/logo.png" alt="" height="16">
                        </span>
                        <i>
                            <img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/logo_sm.png" alt="" height="28">
                        </i>
                    </a>
                </div>
                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <!--img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"--> <span class="ml-1"><?php echo $_smarty_tpl->tpl_vars['salesname']->value;?>
<i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-cog"></i> <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-help"></i> <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Logout</span>
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
                            <li class="menu-title">Navigation</li>
                            <li>
                                <a href="<?php echo @__CONTROLLER__;?>
/index">
                                    <i class="fa fa-desktop"></i><span class="badge badge-danger badge-pill pull-right"></span> <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-cart-plus"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="todayorder.html">TodayTables</a></li>
                                    <li><a href="tables-datatable.html">HistoryTables</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-group"></i> <span> Group </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="tables-basic.html">UserInfo</a></li>
                                    <li><a href="tables-datatable.html">Userorder</a></li>
                                </ul>
                            </li>
                            
                            <li class="menu-title">More</li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-share"></i> <span> Multi Level </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li><a href="javascript: void(0);">Level 1.1</a></li>
                                    <li><a href="javascript: void(0);" aria-expanded="false">Level 1.2 <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li><a href="javascript: void(0);">Level 2.1</a></li>
                                            <li><a href="javascript: void(0);">Level 2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
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
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Dashboard</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">AiJia</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                        		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                            <div class="col-md-6 col-lg-3">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['v']->value["name"];?>
</h5>
                                        <h6 class="card-subtitle text-custom">秒杀价:<?php echo $_smarty_tpl->tpl_vars['v']->value["out_price"];?>
 RMB</h6>
                                    </div>
                                    <img class="img-fluid" src="<?php echo @PUBLIC_ROOT_URL;?>
<?php echo $_smarty_tpl->tpl_vars['v']->value["pic_url"];?>
" alt="Ware">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['v']->value["info"];?>
</p>
                                        <a href="<?php echo @__APP__;?>
/sale/buyware?ware_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" class="card-link">订购</a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <?php } ?>
                        </div>
                        <!-- end row -->
                        
                        <!--div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-box float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Orders</h6>
                                    <h4 class="mb-3" data-plugin="counterup"><?php echo $_smarty_tpl->tpl_vars['devSelect']->value["v1"];?>
</h4>
                                    <span class="badge badge-primary"> +11% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-layers float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Revenue</h6>
                                    <h4 class="mb-3">$<span data-plugin="counterup"><?php echo $_smarty_tpl->tpl_vars['devSelect']->value["v2"];?>
</span></h4>
                                    <span class="badge badge-primary"> -29% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-tag float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Average Price</h6>
                                    <h4 class="mb-3">$<span data-plugin="counterup"><?php echo $_smarty_tpl->tpl_vars['devSelect']->value["v3"];?>
</span></h4>
                                    <span class="badge badge-primary"> 0% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-briefcase float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Product Sold</h6>
                                    <h4 class="mb-3" data-plugin="counterup"><?php echo $_smarty_tpl->tpl_vars['devSelect']->value["v3"];?>
</h4>
                                    <span class="badge badge-primary"> +89% </span> <span class="text-muted ml-2 vertical-middle">Last year</span>
                                </div>
                            </div>
                        </div-->
                        <!-- end row -->

                        <!--div class="row">
                            <div class="col-xl-7">
                                <div class="card-box">
                                    <h4 class="header-title">Transactions History</h4>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Conversion Rate</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">1.78%</span> <small></small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Average Order Value</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">25.87</span> <small>USD</small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Total Wallet Balance</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">87,4517</span> <small>USD</small></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <canvas id="transactions-chart" height="350" class="mt-4"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="card-box">
                                    <h4 class="header-title">Sales History</h4>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Conversion Rate</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">3.94%</span> <small></small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Average Sales</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i> <span class="text-dark">16.25</span> <small>USD</small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Total Sales</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">124,858.67</span> <small>USD</small></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <canvas id="sales-history" height="350" class="mt-4"></canvas>
                                </div>
                            </div>
                        </div-->
                        <!-- end row -->

                        <!--div class="row">
                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Messages</h4>

                                    <div class="inbox-widget slimscroll" style="max-height: 370px;">
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/users/avatar-1.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Chadengle</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">13:40 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/users/avatar-2.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Tomaslau</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">13:34 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/users/avatar-3.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Stillnotdavid</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">13:17 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/users/avatar-4.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Kurafire</p>
                                                <p class="inbox-item-text">Nice to meet you</p>
                                                <p class="inbox-item-date">12:20 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/users/avatar-5.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Shahedk</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">10:15 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/users/avatar-6.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Adhamdannaway</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">9:56 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/users/avatar-8.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Arashasghari</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">10:15 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-9.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Joshaustin</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">9:56 AM</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Latest Comments</h4>

                                    <div class="comment-list slimscroll" style="max-height: 370px;">
                                        <a href="#">
                                            <div class="comment-box-item">
                                                <div class="badge badge-pill badge-success">Ubold - Admin</div>
                                                <p class="commnet-item-date">1 month ago</p>
                                                <h6 class="commnet-item-msg">Do you have any plans to add a vertical menu?</h6>
                                                <p class="commnet-item-user">Ubold User</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="comment-box-item">
                                                <div class="badge badge-pill badge-warning">Adminox - Admin</div>
                                                <p class="commnet-item-date">1 month ago</p>
                                                <h6 class="commnet-item-msg">Hello, what is your plan to upgrade Bootstrap 4 versions? Beta or wait for stable?</h6>
                                                <p class="commnet-item-user">Ubold User</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="comment-box-item">
                                                <div class="badge badge-pill badge-primary">Staro - Landing</div>
                                                <p class="commnet-item-date">1 month ago</p>
                                                <h6 class="commnet-item-msg">Hi coderthemes – do you have PSD for this admin UI? I could really use it.</h6>
                                                <p class="commnet-item-user">Ubold User</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="comment-box-item">
                                                <div class="badge badge-pill badge-dark">Ubold - Admin</div>
                                                <p class="commnet-item-date">1 month ago</p>
                                                <h6 class="commnet-item-msg">Do you have any plans to add a vertical menu?</h6>
                                                <p class="commnet-item-user">Ubold User</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Last Transactions</h4>

                                    <ul class="list-unstyled transaction-list slimscroll mb-0" style="max-height: 370px;">
                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Advertising</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">07/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-up text-danger"></i>
                                            <span class="tran-text">Support licence</span>
                                            <span class="pull-right text-danger tran-price">-$965</span>
                                            <span class="pull-right text-muted">07/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Extended licence</span>
                                            <span class="pull-right text-success tran-price">+$830</span>
                                            <span class="pull-right text-muted">07/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Advertising</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">05/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-up text-danger"></i>
                                            <span class="tran-text">New plugins added</span>
                                            <span class="pull-right text-danger tran-price">-$452</span>
                                            <span class="pull-right text-muted">05/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Google Inc.</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">04/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-up text-danger"></i>
                                            <span class="tran-text">Facebook Ad</span>
                                            <span class="pull-right text-danger tran-price">-$364</span>
                                            <span class="pull-right text-muted">03/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">New sale</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">03/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Advertising</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">29/08/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-up text-danger"></i>
                                            <span class="tran-text">Support licence</span>
                                            <span class="pull-right text-danger tran-price">-$854</span>
                                            <span class="pull-right text-muted">27/08/2017</span>
                                            <span class="clearfix"></span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div-->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2017 - 2018 © Abstack. - Coderthemes.com
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

    </body>
</html><?php }} ?>