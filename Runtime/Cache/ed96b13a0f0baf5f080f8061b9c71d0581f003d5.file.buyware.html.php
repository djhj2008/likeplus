<?php /* Smarty version Smarty-3.1.6, created on 2018-03-12 01:25:50
         compiled from "D:/amp/Apache24/htdocs/likeplus/Home/View\Sale\buyware.html" */ ?>
<?php /*%%SmartyHeaderCode:144375aa14980368fd9-58615148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed96b13a0f0baf5f080f8061b9c71d0581f003d5' => 
    array (
      0 => 'D:/amp/Apache24/htdocs/likeplus/Home/View\\Sale\\buyware.html',
      1 => 1520789092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144375aa14980368fd9-58615148',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa149804db9d',
  'variables' => 
  array (
    'salesname' => 0,
    'user' => 0,
    'addr' => 0,
    'ware' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa149804db9d')) {function content_5aa149804db9d($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Abstack - Responsive Web App Kit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo @PUBLIC_ROOT_URL;?>
assets/images/favicon.ico">

        <!-- Plugins css-->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/switchery/switchery.min.css">
        
        <!-- App css -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
assets/css/style.css?version=1.01.01" rel="stylesheet" type="text/css" />

        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/modernizr.min.js"></script>
        <script src="<?php echo @AJS_URL;?>
region_select.js"></script>
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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <div class="card-box">
                                    <div class="card-box">
                                        <div class="form-group row">
                                            <div>
                                                <h4 class="mt-0 font-20">地址信息</h4>
                                                <?php if (empty($_smarty_tpl->tpl_vars['user']->value)!=true){?>
                                                    <br>
                                                <?php }else{ ?>
                                                    <p class="text-muted font-14 mb-2">
                                                        请选择详细的购买用户地址信息.
                                                    </p>
                                                <?php }?>
                                                <div>
                                                    <h6 id="userinfo" name="userinfo"><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</h6>
                                                    <p id="addr" name="addr"><?php echo $_smarty_tpl->tpl_vars['addr']->value;?>
</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6 offset-2">
                                                    <button type="button" id="search_user" onclick="search_user()"
                                                            class="btn btn-github" >
                                                        <i class="fa fa-address-book mr-0"></i>
                                                        <span>查找</span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-18">
                                                <form>
                                                    <div class="card-box">
                                                    <div class="form-group row">
                                                        <h4 class="font-20 mr-4"><b><?php echo $_smarty_tpl->tpl_vars['ware']->value[0]['name'];?>
</b></h4>
                                                        <p class="text-custom mt-2 font-16">单价:<?php echo $_smarty_tpl->tpl_vars['ware']->value[0]['out_price'];?>
 RMB</p>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div>
                                                        <p class="text-muted font-16  mt-3">购买数量:</p>
                                                        </div>
                                                        <div class="btn-group col-6">
                                                            <button type="button" id="del" onclick="code1()" class="btn btn-github mb-3 mt-2">-</button>
                                                            <input type="text" id="count" oninput="code3()" class="form-control  mb-3 mt-2" value="1"/>
                                                            <button type="button" id="add" onclick="code2()" class="btn btn-github mb-3 mt-2">+</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div>
                                                        <p class="text-muted font-16  mt-2">总价:</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" id="money" class="form-control" readonly="" value="<?php echo $_smarty_tpl->tpl_vars['ware']->value[0]['out_price'];?>
"/>
                                                        </div>
                                                        <div>
                                                            <p class="text-custom font-16 mt-2">RMB</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col offset-8">
                                                            <button type="submit" class="btn btn-github">
                                                                确定
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                        <!--div class="card-box">
                                            <div class="form-group row">
                                                <div>
                                            <h4 class="mt-0 font-20">地址信息</h4>
                                            <p class="text-muted font-14 mb-2">
                                                请填写或选择订单的详细地址信息.
                                            </p>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6 offset-2">
                                                        <button type="button"
                                                                class="btn btn-github">
                                                            <i class="fa fa-address-book mr-0"></i>
                                                            <span>查找</span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <form role="form">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-4 col-form-label">姓名<span class="text-danger">*</span></label>
                                                    <div class="col-8">
                                                        <input type="text" required parsley-type="email" class="form-control"
                                                               id="inputEmail3" placeholder="真实姓名">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="hori-pass1" class="col-4 col-form-label">电话<span class="text-danger">*</span></label>
                                                    <div class="col-8">
                                                        <input id="hori-pass1" type="number" placeholder="手机号" required
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <label for="hori-pass1" class="col-4 col-form-label">地址:<span class="text-danger">*</span></label>
                                                    <div class="col-8">
                                                        <select name="pro" id="pro" class="form-control" data-style="btn-light"></select>
                                                    </div>
                                                </div>

                                                <div class="form-group row" >
                                                    <label for="hori-pass1" class="col-4 col-form-label">城市:<span class="text-danger">*</label>
                                                    <div class="col-8">
                                                        <select name="ci" id="ci" class="form-control" data-style="btn-light"></select>
                                                    </div>
                                                </div>

                                                <div class="form-group row" >
                                                    <label for="hori-pass1" class="col-4 col-form-label">区县:<span class="text-danger">*</label>
                                                    <div class="col-8">
                                                        <select name="ar" id="ar" class="form-control" data-style="btn-light"></select>
                                                    </div>
                                                </div>

                                                <script type="text/javascript">
                                                    new PCAS('pro', 'ci', 'ar', '辽宁省', '', '');
                                                </script>

                                                <div class="form-group row" >
                                                    <label for="hori-pass1" class="col-4 col-form-label">详细地址:<span class="text-danger">*</label>
                                                    <div class="col-8">
                                                        <textarea required class="form-control" name="ad" id="ad"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-8 offset-4">
                                                        <button type="submit" class="btn btn-github">
                                                            确定
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div-->
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-right">
                    Copyright &copy; 2018.爱加社区
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        <script type="text/javascript">
            function code1(){
                var count = document.getElementById('count').value;
                count = Number(count);
                if(count>1){
                    count = count-1;
                }else{
                    count = 1;
                }
                document.getElementById('count').value=count;
                var price = count*<?php echo $_smarty_tpl->tpl_vars['ware']->value[0]["out_price"];?>
;
                document.getElementById('money').value=price.toFixed(2);
            }

            function code2(){
                var count = document.getElementById('count').value;
                count = Number(count);
                if(count<100){
                    count = count+1;
                }else{
                    count = 100;
                }
                document.getElementById('count').value=count;
                var price = count*<?php echo $_smarty_tpl->tpl_vars['ware']->value[0]["out_price"];?>
;
                document.getElementById('money').value=price.toFixed(2);
            }

            function code3(){
                var count = document.getElementById('count').value;
                count = Number(count);
                if(count < 1){
                    count = 1;
                    document.getElementById('count').value=count;
                }else if(count > 100){
                    count = 100;
                    document.getElementById('count').value=count;
                }
                var price = count*<?php echo $_smarty_tpl->tpl_vars['ware']->value[0]["out_price"];?>
;
                document.getElementById('money').value=price.toFixed(2);
            }

            function search_user(){
                window.location.href="<?php echo @__CONTROLLER__;?>
/userinfo?ware_id=<?php echo $_smarty_tpl->tpl_vars['ware']->value[0]['auto_id'];?>
";
            }
        </script>

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

        <!-- Required datatable js -->
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.print.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- App js -->
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.core.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
assets/js/jquery.app.js"></script>


        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/bootstrap-maxlength/bootstrap-maxlength.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="<?php echo @PUBLIC_ROOT_URL;?>
assets/pages/jquery.autocomplete.init.js"></script>

        <!-- Init Js file -->
        <script type="text/javascript" src="<?php echo @PUBLIC_ROOT_URL;?>
assets/pages/jquery.form-advanced.init.js"></script>
    </body>
</html><?php }} ?>