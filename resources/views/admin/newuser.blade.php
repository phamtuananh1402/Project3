<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="/images/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link rel="stylesheet" href="{{asset('css/dropdown.css')}}">
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
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

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
                <li>
                    <a href="/admin/grade">
                        <i class="pe-7s-note2"></i>
                        <p>Grade Management</p>
                    </a>
                </li>

                <li class="active">
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
                    <a class="navbar-brand" href="#">NEW USER</a>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add new user</h4>
                                <p class="category">Add new user with basic information.</p>
                            </div>
                            <div class="content">
                                <form action="create" method="POST">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Mã số (require)</label>
                                                <input type="text" name="msuser" class="form-control"
                                                       placeholder="Email" required>
                                                @if ($errors->has('msuser'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('msuser') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="Name">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Role</label>

                                                <span class="custom-dropdown big">

                                                <select name="role">

                                                    <option value="manager">Managerment Teacher</option>
                                                    <option value="student">Student</option>
                                                    <option value="lecturer">Lecture</option>

                                                </select>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Add
                                        user
                                    </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
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
                            <a href="dashboard.html">
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

<script src='{{asset('http://ajax.googleapis.com/ajax/libs/prototype/1.7.1/prototype.js')}}'></script>

<script src="{{asset('/js/dropdown.js')}}"></script>

</html>
