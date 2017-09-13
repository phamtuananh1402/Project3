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
                        <th>Topic title</th>
                        <th>Company Confirm</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    @foreach($assign as $ass)
                        <tr>
                            <td><a href="/student/cv/{{$ass->student_id}}">{{$ass->student_id}}</a></td>
                            <td>{{$ass->first_name}}</td>
                            <td>{{$ass->last_name}}</td>
                            <td><a href="/topic/{{$ass->topic_id}}">{{$ass->title}}</a></td>
                            <td class="{{$ass->student_id}}a">
                                @if($ass->company_confirm == "Pending")
                                    <label class="label label-warning" readonly="true">Pending</label>
                                @elseif($ass->company_confirm == "Approved")
                                    <label class="label label-success" readonly="true">Approved</label>
                                @elseif($ass->company_confirm == "Declined")
                                    <label class="label label-danger" readonly="true">Declined</label>
                                @endif

                            </td>
                            <td>
                                @if($ass->status == "Pending")
                                    <label class="label label-warning" readonly="true">Pending</label>
                                @elseif($ass->status == "Approved")
                                    <label class="label label-success" readonly="true">Approved</label>
                                @elseif($ass->status == "Declined")
                                    <label class="label label-danger" readonly="true">Declined</label>
                                @endif
                            </td>
                            <td class="{{$ass->student_id}}b">
                                @if($ass->company_confirm == "Pending")
                                    <button class="btn btn-success btn-xs" onclick="approve('{{$ass->student_id}}', '{{$ass->company_id}}', '{{$ass->topic_id}}')">Approve</button>
                                    <button class="btn btn-danger btn-xs" onclick="decline('{{$ass->student_id}}')">Decline</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </table>
                {{$assign->links()}}
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
<script type="text/javascript" src="/js/listtopic.js"></script>
<script type="text/javascript" src="/js/internassign.js"></script>

</body>
</html>
