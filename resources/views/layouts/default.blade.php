<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>H+ 后台主题 - 主页</title>

    {{--<meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">--}}
    {{--<meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">--}}
    <!--[if lt IE 9]>
    <!--<meta http-equiv="refresh" content="0;ie.html" />-->
    {{--<![endif]-->--}}
    <style>
        table{
            table-layout:fixed; /*使水平布局不受单元格的内容的影响*/
        }
        td{
            width:100%;
            overflow:hidden;/*文本超出时隐藏*/
            white-space:nowrap;/*规定表格单元格中的内容不换行。*/
        }
    </style>
    <link href="{{asset('back')}}/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="{{asset('back')}}/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="{{asset('back')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('back')}}/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    @include('layouts.nva')
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1" style="overflow: auto;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown hidden-xs">
                        <a class="right-sidebar-toggle" aria-expanded="false">
                            <i class="fa fa-tasks"></i> 主题
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div id="did">
        @yield('content')
        </div>
        @include('layouts.footer')
    </div>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <div id="right-sidebar">
        <div class="sidebar-container">

            <ul class="nav nav-tabs navs-3">

                <li class="active">
                    <a data-toggle="tab" href="#tab-1">
                        <i class="fa fa-gear"></i> 主题
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="sidebar-title">
                        <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                        <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                    </div>
                    <div class="skin-setttings">
                        <div class="title">主题设置</div>
                        <div class="setings-item">
                            <span>收起左侧菜单</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                    <label class="onoffswitch-label" for="collapsemenu">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>固定顶部</span>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                    <label class="onoffswitch-label" for="fixednavbar">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                    <label class="onoffswitch-label" for="boxedlayout">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="title">皮肤选择</div>
                        <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                        </div>
                        <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                        </div>
                        <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--右侧边栏结束-->
    <!--mini聊天窗口开始-->
</div>
    <!--mini聊天窗口结束-->


<!-- 全局js -->
<script src="{{asset('back')}}/js/jquery.min.js?v=2.1.4"></script>
<script src="{{asset('back')}}/js/bootstrap.min.js?v=3.3.6"></script>
<script src="{{asset('back')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{asset('back')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{asset('back')}}/js/plugins/layer/layer.min.js"></script>
<script src="{{asset('js')}}/jquery-3.3.1.js"></script>
<!-- 自定义js -->
<script src="{{asset('back')}}/js/hplus.js?v=4.1.0"></script>
<script type="text/javascript" src="{{asset('back')}}/js/contabs.js"></script>

<!-- 第三方插件 -->
{{--<script src="{{asset('back')}}/js/plugins/pace/pace.min.js"></script>--}}
<script type="text/javascript">
    $(document).ready(function(){
        var height = $(window).height();   // 浏览器的高度
        $("#page-wrapper").height(height)  // 浏览器的高度加在类名为box的DIV 上
    })
</script>

{{--list推送多选全选--}}
<script type="text/javascript">
    $(function(){
        $("#alls").click(function(){
            $("input[type=checkbox]").each(function(){
                this.checked = true;
            });
        })
        $("#falseall").click(function(){
            $("input[type=checkbox]").each(function(){
                if(this.checked) {
                    this.checked = false;
                } else {
                    this.checked = true;
                }
            });
        });
    });
</script>
<script>
    $(function () {
        $("#vodPrope").submit(function () {
            if($("#seleId option:selected").val() == false){
                alert('请选择至少一条推送的数据和子站');
                return false;
            }else{
                return true
            }
        })
    })
</script>

</body>

</html>
