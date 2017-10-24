<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Student Intern Process | SIEIntern</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #4 for rowreorder extension demos" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"
    />
    <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css"
    />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
    <!-- BEGIN HEADER -->
    @include('layouts.header')
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        @include('layouts.sidebar')
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Student Intern Process
                            <small>rowreorder extension demos</small>
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->

                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE BREADCRUMB -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Tables</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span class="active">Datatables</span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMB -->
                <!-- BEGIN PAGE BASE CONTENT -->

                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase">Header Fixed</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                    <thead>
                                        <tr class="">
                                            <th> Topic </th>
                                            <th> Startdate </th>
                                            <th> Company </th>
                                            <th> Status </th>
                                            <th> Process </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> {{$topic->title}} </td>
                                            <td> {{$topic->created_at}} </td>
                                            <td> {{$company->company_name}} </td>
                                            <td> Intern status </td>
                                            <td> Outline link to download</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">Work Outline</span>
                                    <div class="caption-desc font-grey-cascade"> Default list element style. Activate by adding
                                        <pre class="mt-code">.list-todo</pre> class to the
                                        <pre class="mt-code">ul</pre> element. </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="mt-element-list">
                                    <div class="mt-list-head list-todo red">
                                        <div class="list-head-title-container">
                                            <h3 class="list-title">{{$topic->title}}</h3>
                                            <div class="list-head-count">
                                                <div class="list-head-count-item">
                                                    <i class="fa fa-check"></i> {{$countWorked->done}}</div>
                                                <div class="list-head-count-item">
                                                    <i class="fa fa-cog"></i> {{$countWorking->working}}</div>
                                            </div>
                                        </div>
                                        <a href="javascript:;">
                                            <div class="list-count pull-right red-mint">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="mt-list-container list-todo" id="accordion1" role="tablist" aria-multiselectable="true">
                                        <div class="list-todo-line"></div>
                                        <ul>
                                        @foreach($outline as $ol)
                                        @php
                                            $workByWeek  = DB::table('outline_work')->where('student_id',$ol->student_id)->where('week',$ol->week)->get();
                                            $workPerWeek = DB::table('outline_work')->where('student_id',$ol->student_id)->where('week',$ol->week)->count();
                                        @endphp
                                            <li class="mt-list-item">
                                                <div class="list-todo-icon bg-white">
                                                    <i class="fa fa-database"></i>
                                                </div>
                                                <div class="list-todo-item dark">
                                                    <a class="list-toggle-container" data-toggle="collapse" data-parent="#accordion1" onclick=" " href="#{{$ol->week}}" aria-expanded="false">
                                                        <div class="list-toggle done uppercase">
                                                            <div class="list-toggle-title bold">{{$ol->work}}</div>
                                                            <div class="badge badge-default pull-right bold">{{$workPerWeek}}</div>
                                                        </div>
                                                    </a>
                                                    <div class="task-list panel-collapse collapse in" id="{{$ol->week}}">
                                                        <ul class="status-actions">
                                                        
                                                        @foreach($workByWeek as $work)
                                                            <li class="task-list-item done">
                                                                <div class="task-icon">
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-database"></i>
                                                                    </a>
                                                                </div>
                                                                @if($work->status == 'Working')
                                                                <div class="task-status">
                                                                    <a class="done" href="javascript:;" id="{{$work->id}}-done" onclick="done('{{$work->id}}')">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a class="pending" href="javascript:;" id="{{$work->id}}-fail" onclick="fail('{{$work->id}}')">
                                                                        <i class="fa fa-close"></i>
                                                                    </a>
                                                                </div>
                                                                @elseif($work->status=='Done')
                                                                <div class="task-status">
                                                                    <a class="done">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    
                                                                </div>
                                                                @elseif($work->status == 'Failed')
                                                                <div class="task-status">
                                                                
                                                                    <a class="fail" href="javascript:;">
                                                                        <i style="color: #ff0000" class="fa fa-close"></i>
                                                                    </a>
                                                                </div>
                                                                @endif
                                                                

                                                                <div class="task-content">
                                                                    <h4 class="uppercase bold">
                                                                        <a href="javascript:;">{{$work->work}}</a>
                                                                    </h4>
                                                                    <p>{{$work->work_content}} </p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                        <div class="task-footer bg-grey">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <a class="task-trash" href="javascript:;">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="col-xs-6">
                                                                    <a class="task-add" href="javascript:;">
                                                                        <i class="fa fa-plus"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END PAGE BASE CONTENT -->
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->

    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2016 &copy; Metronic Theme By
            <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
            <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free"
                target="_blank">Purchase Metronic!</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN CORE PLUGINS -->
    <script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
    <script src="/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
    <script src="/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->

    <script>
        function done(id)
        {
            var removeFail = document.getElementById(id+'-fail')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/instructor/outline/work/done",
                type: 'post',
                
                success: function () {
                        $(removeFail).remove();
                    }
                

            });
           

        }

        function fail(id)
        {
            var removeDone = document.getElementById(id+'-done')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/instructor/outline/work/fail",
                type: 'post',
                
                success: function () {
                        $(removeDone).remove();
                    
                }

            });
            
            
        }

        $(document).ready(function () {
            $('#clickmewow').click(function () {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>
</body>

</html>