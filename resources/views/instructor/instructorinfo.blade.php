<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/instructorinfo.css">
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
@foreach($instructor_id as $ins)
    <div class="main">
        <div class="container">
            <div class="col-md-3 sidebar">
                <div class="managementteacherpicture">
                    <img src="/images/ava1.png" alt="" class="img-responsive"/>

                </div>

                <div class="selections">
                    <ul>
                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="">User infomation</a></li>
                        <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="">Topic Request</a></li>
                        <li><i class="fa fa-bar-chart" aria-hidden="true"></i><a href="/instructor/intern">Intern
                                progress</a></li>


                    </ul>


                </div>


            </div>

            <div class="col-md-9 maincontent">
                <div class="tab">
                    <button class="tablinks" onclick="instructortab(event, 'instructorintfo')"><i
                                class="fa fa-user-circle-o" aria-hidden="true"></i> User Information
                    </button>
                    <button class="tablinks" onclick="instructortab(event, 'editinstructorinfo')"><i class="fa fa-cog"
                                                                                                     aria-hidden="true"></i>
                        Edit Information
                    </button>
                </div>

                <div id="instructorintfo" class="tabcontent">
                    <div class="tab1">
                        <div class="basicinfo">

                            <?php
                            $fname = $ins->first_name;
                            $lname = $ins->last_name;
                            $name = $fname . " " . $lname;
                            ?>
                            <div class="row">
                                <div class="instructorname">{{$name}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-phone" aria-hidden="true"></i> Phone :</div>
                                <div class="instructorphone">{{$ins->phone_number}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email :</div>
                                <div class="instructormail">{{$ins->email}}</div>
                            </div>

                            <div class="row">
                                <div class="infotitle"><i class="fa fa-road" aria-hidden="true"></i> Address :</div>
                                <div class="instructoraddress">Hanoi, Vietnam</div>
                            </div>

                        </div>

                        <div class="instructorexperiences">
                            <div class="moduleheader">Experiences</div>
                            <div class="content">
                                Working for thousand of IT companys, love coding, working for thousand of IT companys,
                                love
                                coding, working for thousand of IT
                                companys, love coding, working for thousand of IT companys, love coding, working for
                                thousand of IT companys, love coding,
                                working for thousand of IT companys, love coding,working for thousand of IT companys,
                                love
                                coding,working for thousand of IT
                                companys, love coding,working for thousand of IT companys, love coding,

                            </div>

                        </div>

                        <div class="instructormotivations">
                            <div class="moduleheader">Motivations</div>
                            <div class="content">
                                Working for thousand of IT companys, love coding, working for thousand of IT companys,
                                love
                                coding, working for thousand of IT
                                companys, love coding, working for thousand of IT companys, love coding, working for
                                thousand of IT companys, love coding,
                                working for thousand of IT companys, love coding,working for thousand of IT companys,
                                love
                                coding,working for thousand of IT
                                companys, love coding,working for thousand of IT companys, love coding,

                            </div>

                        </div>


                    </div>
                </div>

                <div id="editinstructorinfo" class="tabcontent">
                    <div class="tab2">

                        <div class="basicform">
                            <div class="instructorphoneform">
                                <div class="formtitle">Phone</div>
                                <form>
                                    <input type="text" name="phone_number" value="{{$ins->phone_number}}"><br>
                                </form>
                            </div>

                            <div class="instructormailform">
                                <div class="formtitle">Email</div>
                                <form>
                                    <input type="email" name="email" value="{{$ins->email}}"><br>
                                </form>
                            </div>

                            <div class="instructoraddressform">
                                <div class="formtitle">Address</div>
                                <form>
                                    <input type="text" name="phone" value="Hanoi, Vietnam"><br>
                                </form>
                            </div>
                        </div>

                        <div class="instructorexperiencesform">
                            <div class="formtitle">Experiences</div>
                            <form>
                                <input type="text" name="experiences" value=""><br>
                            </form>
                        </div>

                        <div class="instructormotivationsform">
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

@endforeach
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
<script type="text/javascript" src="/js/instructorinfo.js"></script>
<script>
    function instructortab(evt, cityName) {
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
