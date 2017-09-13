<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="/images/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <link href="/css/redesign.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="{{asset('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('http://fonts.googleapis.com/css?family=Roboto:400,700,300')}}" rel='stylesheet'
          type='text/css'>
    <link href="/css/pe-icon-7-stroke.css" rel="stylesheet"/>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="assets/img/sidebar-5.jpg">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href=""><img src="/images/logo.png" alt="" class="img-responsive"/></a>
            </div>

            <ul class="nav">
                <li>
                    <a href="/admin/dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="/admin/post">
                        <i class="pe-7s-news-paper"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="active">
                    <a href="/admin/grade">
                        <i class="pe-7s-note2"></i>
                        <p>Grade Management</p>
                    </a>
                </li>

                <li>
                    <a href="/admin/users">
                        <i class="pe-7s-science"></i>
                        <p>Users</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">GRADE MANAGEMENT</a>
                </div>
                <div class="collapse navbar-collapse">


                    <ul class="nav navbar-nav navbar-right">

                        <li class="helloadmin">
                            <p>Hello, ADMIN</p>

                        </li>
                        <li>
                            <div class="adminava">
                                <img src="/images/adminava.png" alt="" class="img-responsive"/>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="title">Grade management</h4>
                                        <p class="category">Student's intern scores</p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <input type="text" class="myinput" placeholder="Search for names..">
                                        <div class="searchbtn"><img src="/images/searchicon.png" alt=""
                                                                    class="img-responsive"/></div>
                                    </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Company score</th>
                                    <th>Teacher score</th>
                                    <th>Report</th>
                                    <th>Rank</th>
                                    <th>Actions</th>
                                    </thead>
                                    <tbody id="products-list" name="products-list">

                                    @foreach($grades as $gr)
                                        <?php
                                        $id = $gr->student_id;
                                        $student = \Illuminate\Support\Facades\DB::table('students')->where('student_id', '=', $id)->first();
                                        $fname = $student->first_name;
                                        $lname = $student->last_name;
                                        $name = $fname . " " . $lname;
                                        $student_id = $gr->student_id;
                                        $report = DB::table('report')->where('student_id', '=', $id)->first();
                                        ?>
                                        <tr>
                                            <td>{{$gr->student_id}}</td>
                                            <td>
                                                <div class="studentname">{{$name}}</div>
                                            </td>
                                            <td>
                                                <div class="studentclass">{{$student->class}}</div>
                                            </td>
                                            <td>
                                                <div class="companyscore">{{$gr->mark_instructor}}</div>
                                            </td>
                                            <td>
                                                <div class="teachermark">{{$gr->mark_lecturer}}</div>
                                            </td>
                                            @if($report->status == "Submitted")

                                                <td>
                                                    <div class="average"><a href="{{$report->link}}">Report Here</a>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="average">Not Submit yet</div>
                                                </td>
                                            @endif
                                            @if($gr->mark_instructor == 'F' || $gr->mark_lecturer == 'F')
                                                <td>
                                                    <div class="status">Failed!</div>
                                                </td>
                                            @elseif($gr->mark_instructor != null || $gr->mark_lecturer != null)
                                                @if($gr->mark_instructor != 'F' && $gr->mark_lecturer != 'F')
                                                    <td>
                                                        <div class="status">Passed!</div>
                                                    </td>
                                                @endif
                                            @elseif($gr->mark_instructor == null || $gr->mark_lecturer == null)
                                                <td>
                                                    <div class="status">Not Confirm</div>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="editting">
                                                    <button type="button" rel="tooltip" title="Edit"
                                                            class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove"
                                                            class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$grades->links()}}
                            </div>
                        </div>
                    </div>
                    <div class="button">
                        <div class="deletebtn" style="display: inline-block;margin-left: 28%">
                            <button class="btn btn-danger des"
                                    onclick="decline()">CHECK IF STUDENT NOT ASSIGN
                            </button>

                        </div>

                        <div class="deletebtn" style="display: inline-block;margin-left: 5%">
                            <button class="btn btn-danger des"
                                    onclick="send()">Notice Marking
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>
        </footer>


    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="{{asset('https://maps.googleapis.com/maps/api/js?sensor=false')}}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="/js/demo.js"></script>

<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')}}"></script>
<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/ajaxscript.js')}}"></script>

<script type="text/javascript">
    $(".clickedit").click(function () {
        $(".selection").addClass("intro");
    });

</script>
<script type="text/javascript">

    function decline() {

        $.ajax({
            url: "/failed/test",
            type: 'get',
            success: function (result) {
                $('.' + 'teachermark');
                $('.' + 'status');
                toastr.success('Success.', 'Success Alert', {timeOut: 5000});
            },
            error: function () {
                toastr.error('Error', 'Error Alert', {timeOut: 5000});
            }
        });

    }
    function send() {
        $.ajax({
            url: "/notice",
            type: 'get',
            success: function () {
                toastr.success('Success.', 'Success Alert', {timeOut: 5000});
            },
            error: function () {
                toastr.error('Error', 'Error Alert', {timeOut: 5000});
            }
        });

    }


</script>

</html>
