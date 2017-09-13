<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/representation_profile.css')}}">
    <script src="{{asset('https://use.fontawesome.com/f5c1a979a9.js')}}"></script>

</head>
<body>


<div class="banner">
    <div class="wide">

        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <img src="images/logo.png" alt="" class="img-responsive"/>
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
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/company/instructor/create">Create
                            Instructor</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/topics/create">Create
                            Topic</a></li>


                </ul>


            </div>
        </div>
        @foreach($representation_id as $rep)


            <div class="col-md-9 maincontent">
                <div class="tab">
                    <button class="tablinks" onclick="managementteachertab(event, 'managementteacherinfo')"><i
                                class="fa fa-user-circle-o" aria-hidden="true"></i> User Information
                    </button>
                    <button class="tablinks" onclick="managementteachertab(event, 'editmanagementteacherinfo')"><i
                                class="fa fa-cog" aria-hidden="true"></i>
                        Edit Information
                    </button>
                </div>

                <div id="managementteacherinfo" class="tabcontent">
                    <div class="tab1">
                        <div class="basicinfo">
                            <?php
                            $fname = $rep->first_name;
                            $lname = $rep->last_name;
                            $name = $fname . " " . $lname;
                            ?>
                            <div class="row">
                                <div class="managementteachername">{{$name}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-phone" aria-hidden="true"></i> Phone :</div>
                                <div class="managementteacherphone">{{$rep->phone_number}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :</div>
                                <div class="managementteachermail">{{$rep->email}}</div>
                            </div>

                            <div class="row">
                                @foreach($company as $com)
                                    <div class="infotitle"><i class="fa fa-road" aria-hidden="true"></i> Company :</div>
                                    <div class="managementteacheraddress">{{$com->company_name}}</div>
                                @endforeach
                            </div>

                        </div>

                        <div class="managementteacherexperiences">
                            <div class="moduleheader">Published Topic</div>
                            <div class="topictable">

                                <table style="width:100%">
                                    <tr>
                                        <th><i class="fa fa-comment-o" aria-hidden="true"></i> Topic name</th>
                                        <th><i class="fa fa-black-tie" aria-hidden="true"></i> Company</th>
                                        <th><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
                                        <th><i class="fa fa-user-plus" aria-hidden="true"></i> Recruit</th>
                                    </tr>

                                    @foreach($students as $std)

                                        @php
                                            $fname = $std->first_name;
                                            $lname = $std->last_name;
                                            $name = $fname. " " . $lname;
                                        @endphp

                                        <tr>
                                            <td><a href="/student/cv/{{$std->student_id}}">{{$name}}</a>
                                                <div class="topicnote">Click for more information</div>

                                            </td>

                                        </tr>


                                    @endforeach

                                </table>

                            </div>
                        </div>

                        <div class="managementteachermotivations">
                            <div class="moduleheader">Motivations</div>

                            <div class="content">{{$rep->company_id}}</div>

                        </div>


                    </div>
                </div>

                <div id="editmanagementteacherinfo" class="tabcontent">
                    <div class="tab2">

                        <div class="basicform">
                            <div class="managementteacherphoneform">
                                <div class="formtitle">Phone</div>
                                <form>
                                    <input type="text" name="phone" value="01635423754"><br>
                                </form>
                            </div>

                            <div class="managementteachermailform">
                                <div class="formtitle">Email</div>
                                <form>
                                    <input type="text" name=" mail" value="jihyoholic@gmail.com"><br>
                                </form>
                            </div>

                            <div class="managementteacheraddressform">
                                <div class="formtitle">Address</div>
                                <form>
                                    <input type="text" name="phone" value="Hanoi, Vietnam"><br>
                                </form>
                            </div>
                        </div>

                        <div class="managementteacherexperiencesform">
                            <div class="formtitle">Experiences</div>
                            <form>
                                <input type="text" name="experiences" value=""><br>
                            </form>
                        </div>

                        <div class="managementteachermotivationsform">
                            <div class="formtitle">Motivations</div>
                            <form>
                                <input type="text" name="motivations" value=""><br>
                            </form>
                        </div>

                        <div class="row">
                            <div class="dirbutton">
                                <div class="col-md-6">
                                    <div class="clearallbtn">CLEAR ALL</div>

                                </div>
                                <div class="col-md-6">
                                    <div class="submitbtn">SUBMIT INFORMATION</div>
                                </div>

                            </div>


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
@endforeach
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                All right reserved. Belong to Group 10 - LTU12A
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{asset('/js/bottstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/representation_profile.js')}}"></script>
<script>
    function managementteachertab(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
</body>
</html>
