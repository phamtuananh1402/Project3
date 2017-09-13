<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/managementteacherparser.css">
    <script src="/js/parserlib.js"></script>
    <script src="/js/parserlib2.js"></script>

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
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/manager/profile">User infomation</a>
                    </li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/manager/periods">Entries
                            history</a></li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/match">Assignment</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/manager/periods">Periods</a>
                    </li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/manager/topics">Topic Information</a>
                    </li>


                </ul>


            </div>
        </div>

        <div class="col-md-9 maincontent">
            <div class="tab">
                <button class="tablinks" onclick="managementteacherparsertab(event, 'managementteacherparser')"><i
                            class="fa fa-book" aria-hidden="true"></i> Parser
                </button>
                <button class="tablinks" onclick="managementteacherparsertab(event, 'managementteacherparserdone')"><i
                            class="fa fa-cog" aria-hidden="true"></i>
                    Parser done
                </button>
            </div>

            <div id="managementteacherparser" class="tabcontent">
                <div class="tab1">
                    <div class="parserheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Student parser

                    </div>

                    <div class="parserlevel">
                        <div class="high">
                            <button id="high" class="btn btn-danger">High</button>
                        </div>
                        <div class="med">
                            <button id="med" class="btn btn-warning">Medium</button>
                        </div>
                        <div class="low">
                            <button id="low" class="btn btn-info">Low</button>
                        </div>

                    </div>

                    <div class="parsertablehigh">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Company Name</th>
                                <th>Topic</th>
                                <th>Field</th>
                                <th>Skills</th>
                                <th>Level</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($matchingFull as $matchFull)
                                <tr>
                                    <td>{{$matchFull['student_id']}}</td>
                                    <td>{{$matchFull['name']}}</td>
                                    <td>{{$matchFull['company_name']}}</td>
                                    <td>{{$matchFull['title']}}</td>
                                    <td>{{$matchFull['field_name']}}</td>
                                    <td>{{$matchFull['skills_name']}}</td>
                                    <td>{{$matchFull['level_name']}}</td>
                                    <td>

                                        <button class="edit-modal btn btn-info"
                                                onclick="myFunction('{{$matchFull['student_id']}}', '{{$matchFull['company_id']}}', '{{$matchFull['topic_id']}}',
                                                        '{{$matchFull['representation_id']}}','{{Auth::user()->user_id}}')">
                                            <span class="glyphicon glyphicon-edit"></span> Approve
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <p id="demo">
                        <p>

                    </div>

                    <div class="test"></div>

                    <div class="parsertablemed">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Company Name</th>
                                <th>Topic</th>
                                <th>Field</th>
                                <th>Actions</th>

                            </tr>
                            @foreach($matchingField as $matchField)
                                <tr>
                                    <td>{{$matchField['student_id']}}</td>
                                    <td>{{$matchField['name']}}</td>
                                    <td>{{$matchField['company_name']}}</td>
                                    <td>{{$matchField['title']}}</td>
                                    <td>{{$matchField['field_name']}}</td>

                                    <td>
                                        <button class="edit-modal btn btn-info"
                                                onclick="myFunction('{{$matchField['student_id']}}', '{{$matchField['company_id']}}', '{{$matchField['topic_id']}}',
                                                        '{{$matchField['representation_id']}}','{{Auth::user()->user_id}}')">
                                            <span class="glyphicon glyphicon-edit"></span> Approve
                                        </button>
                                    </td>
                                </tr>
                            @endforeach


                        </table>

                        <ul id="pagination" class="pagination-sm"></ul>
                    </div>

                    <div class="parsertablelow">

                        <table style="width:100%">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Company Name</th>
                                <th>Topic</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($matchingSkillLevel as $matchSkillLevel)
                                <?php
                                $fname = $matchSkillLevel['first_name'];
                                $lname = $matchSkillLevel['last_name'];
                                $name = $fname . " " . $lname;
                                ?>
                                <tr>
                                    <td>{{$matchSkillLevel['student_id']}}</td>
                                    <td>{{$name}}</td>
                                    <td>{{$matchSkillLevel['company_name']}}</td>
                                    <td>{{$matchSkillLevel['title']}}</td>

                                    <td>
                                        <button class="edit-modal btn btn-info"
                                                onclick="myFunction('{{$matchSkillLevel['student_id']}}', '{{$matchSkillLevel['company_id']}}', '{{$matchSkillLevel['topic_id']}}',
                                                        '{{$matchSkillLevel['representation_id']}}','{{Auth::user()->user_id}}')">
                                            <span class="glyphicon glyphicon-edit"></span> Approve
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                    </div>

                    <div class="lastrow">
                        <div class="clearallbtn">Clear Checkbox</div>
                        <div class="submitbtn">Approve parser</div>

                    </div>

                </div>
            </div>

            <div id="managementteacherparserdone" class="tabcontent">
                <div class="tab2">

                    <div class="parserheader">
                        <i class="fa fa-book" aria-hidden="true"></i> Parser done

                    </div>
                    <div class="parsertable">

                        <table style="width:100%">
                            <tr>
                                <th>SID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Topic</th>
                                <th>Company confirm</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                            @foreach($matches as $match)
                                <tr>
                                    <td>{{$match->student_id}}</td>
                                    <td>{{$match->first_name}}</td>
                                    <td>{{$match->last_name}}</td>
                                    <td>{{$match->company_name}}</td>
                                    <td>{{$match->title}}</td>
                                    <td>{{$match->company_confirm}}</td>
                                    <td>{{$match->status}}</td>
                                    <td>
                                        @if($match->status=='Pending')
                                            <button class="btn btn-success"
                                                    onclick="parserApprove('{{$match->student_id}}', '{{$match->company_id}}', '{{$match->topic_id}}')">
                                                Approve
                                            </button>
                                            <button class="btn btn-danger"
                                                    onclick="parserDecline('{{$match->student_id}}')">Decline
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
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
<script>
    function myFunction(student_id, company_id, topic_id, rep_id, intern_id) {
        $("#demo").html(student_id + " " + company_id + " " + topic_id + " " + rep_id + " " + intern_id);
        //toastr.success('Approved.', 'Success Alert', {timeOut: 5000});

        $.ajax({

            url: '{{url("/assign")}}',
            type: 'get',
            data: {
                'intern_management_teacher_id': intern_id,
                'representation_id': rep_id,
                'student_id': student_id,
                'company_id': company_id,
                'topic_id': topic_id
            },
            success: function (result) {
                //toastr.success('Approved.', 'Success Alert', {timeOut: 5000});
                toastr.success(student_id + " " + company_id + " " + topic_id + " " + rep_id + " " + intern_id, 'Success Alert', {timeOut: 5000});
            },
            error: function () {
                toastr.error('Erreeor', 'Error Alert', {timeOut: 5000});

            }
        });
    }
</script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/tab.js"></script>
<script type="text/javascript" src="/js/parser.js"></script>

</body>
</html>
