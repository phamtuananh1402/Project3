<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/instructoraccount.css">
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
                    <h2>instructor Intern Program for SIE, instructors can find internships and <br/>employment
                        opportunities in the world’s marketplace</h2>
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
            <div class="instructorpicture">
                <img src="/images/ava2.png" alt="" class="img-responsive"/>

            </div>

            <div class="selections">
                <ul>
                    <li><i class="fa fa-user-circle-o" aria-hidden="true"></i><a
                                href="/company/representation/{{Auth::user()->user_id}}">User infomation</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="company/topics/create">Topic</a>
                    </li>
                    <li><i class="fa fa-id-card" aria-hidden="true"></i><a href="company/assign">Assign as Internship
                            Unit</a></li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i><a href="company/assign">Internship
                            progress</a></li>
                    <li><i class="fa fa-id-card" aria-hidden="true"></i><a href="company/instructor/create">Register
                            instructor account</a></li>

                </ul>


            </div>


        </div>

        <div class="col-md-9 maincontent">

            <div class="header">Register instructor account</div>
            @if($instructor >0)
                Your company already has an instructor. <br>
            @else
                <div class="signupform">
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="col-md-6">
                            <div class="instructorfirstname">
                                <div class="formtitle">Firstname</div>
                                <input type="text" name="first_name"><br>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="instructorlastnameform">
                                <div class="formtitle">Lastname</div>
                                <input type="text" name="last_name"><br>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="instructorphoneform">
                                <div class="formtitle">Password</div>
                                <input type="password" name="password" required><br>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="instructorphoneform">
                                <div class="formtitle">Phone</div>
                                <input type="text" name="phone_nunmber"><br>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="instructormailform">
                                <div class="formtitle">Email</div>
                                <input type="email" name="email" required><br>

                            </div>
                        </div>
                        <div class="row">
                            <div class="dirbutton">
                                <div class="col-md-6">
                                    <button type="reset" class="clearallbtn">CLEAR ALL</button>

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" value="Submit" name="submit" class="submitbtn">SUBMIT
                                        INFORMATION
                                    </button>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            @endif


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
<script type="text/javascript" src="/js/instructoraccount.js"></script>
<script>
    function instructorinfotab(evt, cityName) {
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
