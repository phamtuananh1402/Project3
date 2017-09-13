<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/listtopic.css">
    <script src="{{asset('https://use.fontawesome.com/f5c1a979a9.js')}}"></script>

    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js')}}"></script>
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css')}}"
          rel="stylesheet">

</head>
<body>


<div class="banner">
    <div class="wide">

        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <img src="/images/logo.png" alt="" class="img-responsive"/>
                        </div>
                    </div>
                    @include('layouts.logout')

                </div>

            </div>

        </div>

        <div class="container inside">

            <div class="row">
                <div class="col-md-12">
                    <h1>WELCOME TO SIE INTERN WEBSITE</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Student Intern Program for SIE, students can find internships and <br/>employment opportunities
                        in the world’s marketplace</h2>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="registerbtn">REGISTER NOW</div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="main">
    <div class="container">
        <div class="col-md-3 sidebar">
            <div class="managementteacherpicture">
                <img src="/images/ava1.png" alt="" class="img-responsive"/>

            </div>

            <div class="selections">
                <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="">User infomation</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/assign">Student Assign</a>
                    </li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/choose">Choose a specified student</a>
                    </li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/company/instructor/create">Create
                            Instructor</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/topics/create">Create
                            Topic</a></li>


                </ul>


            </div>
        </div>
            <div class="col-md-9 maincontent">

                <div class="topicheader"> Available Student</div>

                <div class="topictable">

                    <table style="width:100%">
                        <tr>
                            <th>SID</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Expect Company</th>
                            <th>Actions</th>
                        </tr>

                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->student_id}}</td>
                                <td>{{$student->first_name}}</td>
                                <td>{{$student->last_name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->company_name}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="window.location='/company/assign/{{$student->student_id}}'">Pick</button>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    {{$students->links()}}
                </div>

            </div>
    </div>
</div>


<div class="subfooter"></div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="bottombrand">
                    <div class="p1">
                        Trường Đại học Bách Khoa Hà Nội
                    </div>
                    <div class="p2">
                        Viện đào tạo Quốc tế SIE
                    </div>
                    <div class="p3">
                        PROJECT 2
                    </div>
                </div>

            </div>

            <div class="col-md-4 about">
                <div class="bottomtitle">ABOUT</div>
                <div class="bottomlink">
                    <div class="link"><a href="">Home</a></div>
                    <div class="link"><a href="">News</a></div>
                    <div class="link"><a href="">Course</a></div>
                    <div class="link"><a href="">Sign Up</a></div>
                    <div class="link"><a href="">Contact</a></div>

                </div>
            </div>

            <div class="col-md-4 contact">
                <div class="bottomtitle">CONTACT US</div>
                <div class="bottomlink">
                    <div class="link">Home</div>
                    <div class="link">News</div>
                    <div class="link">Course</div>
                    <div class="link">Sign Up</div>
                    <div class="link">Contact</div>

                </div>
            </div>

        </div>


    </div>

</div>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                All right reserved. Belong to Group 10 - LTU12A
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/bootstrap.js"></script>

</body>
</html>
