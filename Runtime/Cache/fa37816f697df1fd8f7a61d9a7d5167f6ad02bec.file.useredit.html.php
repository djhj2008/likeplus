<?php /* Smarty version Smarty-3.1.6, created on 2018-03-12 01:09:36
         compiled from "D:/amp/Apache24/htdocs/likeplus/Home/View\Sale\useredit.html" */ ?>
<?php /*%%SmartyHeaderCode:325695aa5404b3c2037-33405569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa37816f697df1fd8f7a61d9a7d5167f6ad02bec' => 
    array (
      0 => 'D:/amp/Apache24/htdocs/likeplus/Home/View\\Sale\\useredit.html',
      1 => 1520788166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '325695aa5404b3c2037-33405569',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5aa5404b4b1b9',
  'variables' => 
  array (
    'salesname' => 0,
    'user' => 0,
    'ware_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa5404b4b1b9')) {function content_5aa5404b4b1b9($_smarty_tpl) {?><!DOCTYPE html>
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

        <!-- DataTables -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
        <script src="<?php echo @AJS_URL;?>
region_select.js?version=1.01.01"></script>
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
                                    <li><a href="tables-datatable.html">用户个人信息</a></li>
                                    <li><a href="tables-datatable.html">用户订单信息</a></li>
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
                        <div class="card-box">
                        <div class="form-group row">
                            <div>
                        <h4 class="mt-0 font-20">地址信息</h4>
                            </div>
                        </div>
                        <form role="form" action="<?php echo @__APP__;?>
/sale/usersave?uid=<?php echo $_smarty_tpl->tpl_vars['user']->value[0]['auto_id'];?>
&ware_id=<?php echo $_smarty_tpl->tpl_vars['ware_id']->value;?>
"   method="post">
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">姓名</label>
                                <div class="col-8">
                                    <input type="text" required parsley-type="email" class="form-control"
                                           id="name" name="name" placeholder="真实姓名" value="<?php echo $_smarty_tpl->tpl_vars['user']->value[0]['name'];?>
">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number" class="col-4 col-form-label">电话</label>
                                <div class="col-8">
                                    <input id="number" name="number" type="number" placeholder="手机号" required
                                           class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value[0]['phone'];?>
">
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="pro" class="col-4 col-form-label">省:</label>
                                <div class="col-8">
                                    <select name="pro" id="pro" class="form-control" data-style="btn-light"></select>
                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="ci" class="col-4 col-form-label">城市:</label>
                                <div class="col-8">
                                    <select name="ci" id="ci" class="form-control" data-style="btn-light" ></select>
                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="ar" class="col-4 col-form-label">区县:</label>
                                <div class="col-8">
                                    <select name="ar" id="ar" class="form-control" data-style="btn-light"></select>
                                </div>
                            </div>

                            <script type="text/javascript">
                                new PCAS('pro', 'ci', 'ar',"<?php echo $_smarty_tpl->tpl_vars['user']->value[0]['province'];?>
", "<?php echo $_smarty_tpl->tpl_vars['user']->value[0]['city'];?>
","<?php echo $_smarty_tpl->tpl_vars['user']->value[0]['area'];?>
");
                            </script>

                            <div class="form-group row" >
                                <label for="ad" class="col-4 col-form-label">详细地址:</label>
                                <div class="col-8">
                                    <textarea required class="form-control" name="ad" id="ad"><?php echo $_smarty_tpl->tpl_vars['user']->value[0]['addr'];?>
</textarea>
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
                    </div>
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

        <script type="text/javascript">
            $(document).ready(function() {
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    info: false,
                    buttons: ['excel'],
                    language: {
                        "sProcessing": "处理中...",
                        "sLengthMenu": "显示 _MENU_ 项结果",
                        "sZeroRecords": "没有匹配结果",
                        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                        "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                        "sInfoPostFix": "",
                        "sSearch": "搜索:",
                        "sUrl": "",
                        "sEmptyTable": "表中数据为空",
                        "sLoadingRecords": "载入中...",
                        "sInfoThousands": ",",
                        "oPaginate": {
                            "sFirst": "首页",
                            "sPrevious": "上页",
                            "sNext": "下页",
                            "sLast": "末页"
                        },
                        "oAria": {
                            "sSortAscending": ": 以升序排列此列",
                            "sSortDescending": ": 以降序排列此列"
                        }
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

    </body>
</html><?php }} ?>