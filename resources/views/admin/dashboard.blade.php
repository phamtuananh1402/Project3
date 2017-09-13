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
    <link href="{{asset('http://fonts.googleapis.com/css?family=Roboto:400,700,300')}}" rel='stylesheet'>
    <link href="/css/pe-icon-7-stroke.css" rel="stylesheet"/>


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="/images/sidebar-5.jpg">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href=""><img src="/images/logo.png" alt="" class="img-responsive"/></a>
            </div>

            <ul class="nav">
                <li class="active">
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
                <li>
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
                    <a class="navbar-brand" href="#">WELCOME ADMIN</a>
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">At a glance</h4>
                                <p class="category">Last news</p>
                            </div>
                            <div class="content">
                                <div class="maincontent">
                                    <div class="news">
                                        <ul>
                                            <li><a href="">11 new posts</a></li>
                                            <li><a href="">5 new users</a></li>
                                            <li><a href="">1098 new grades</a></li>
                                        </ul>

                                    </div>


                                </div>


                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Last activities : 8 hours ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Activities</h4>
                                <p class="category"> Recently Published</p>
                            </div>
                            <div class="content">
                                <div class="recentlyacts">
                                    <ul>
                                        <li>
                                            <div class="acttime">Mar 10th, 12:23 pm</div>
                                            <a href="">Trời đất dung hoa</a></li>
                                        <li>
                                            <div class="acttime">Mar 9th, 8:59 am</div>
                                            <a href="">Người yếu thế, họ thật sự là ai?</a></li>
                                        <li>
                                            <div class="acttime">Mar 8th, 8:53 am</div>
                                            <a href="">Bỏ ngày 8/3 – Nên hay Không?</a></li>
                                    </ul>

                                </div>
                                <div class="footer">

                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <a href="/admin/post">
                                <div class="header">
                                    <h4 class="title">Posts</h4>
                                    <p class="category">All posts</p>
                                </div>
                                <div class="content">
                                    <p>Move to posts</p>
                                    <div class="footer">

                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-check"></i> Data information certified
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">
                            <a href="/admin/grade">
                                <div class="header">
                                    <h4 class="title">Grade management</h4>
                                    <p class="category">All grading content</p>
                                </div>
                                <div class="content">
                                    <p>Move to grade management</p>
                                    <div class="footer">

                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-check"></i> Data information certified
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <a href="/admin/users">
                                <div class="header">
                                    <h4 class="title">Users</h4>
                                    <p class="category">System's users</p>
                                </div>
                                <div class="content">
                                    <p>Move to Manage Users</p>
                                    <div class="footer">

                                        <hr>
                                        <div class="stats">
                                            <i class="fa fa-check"></i> Data information certified
                                        </div>
                                    </div>
                                </div>
                            </a>
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


</html>
