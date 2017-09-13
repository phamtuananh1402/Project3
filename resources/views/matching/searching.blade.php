<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/searchview.css">
    <script src="/js/fontawesome.js"></script>
    <style>
        input[type="text"] {
            padding: 10px;
            border: solid 1px #fff;
            box-shadow: inset 1px 1px 2px 0 #707070;
            transition: box-shadow 0.3s;
        }

        input[type="text"]:focus,
        input[type="text"].focus {
            box-shadow: inset 1px 1px 2px 0 #c9c9c9;
        }

    </style>
</head>
<body>


<div class="banner">
    <div class="wide" style="background-image:url({{asset('images/banner.png')}});">

        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <img src="{{asset('images/logo.png')}}" alt="" class="img-responsive"/>
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
        <div class="row">
            <div class="col-md-12">
                <div class="searchheader"> Searching</div>
                <div class="headerdes">You can choose to search for Company, Student, or Topic.</div>

            </div>

        </div>

        <div class="row">

            <div class="searchingcontent">
                <div class="dess">You want to <span>search for</span> :</div>


                <div class="selection">
                    <form method="post" action='/search/input'>
                        {{csrf_field()}}
                        <select class="selectdesign" name="sel">
                            <option value="company">Company</option>
                            <option name="student" value="student">Student</option>
                            <option value="topic">Topic</option>
                        </select>

                        <div class="searched">
                            <div class="dess2">What you want to <span>search</span> :</div>
                            <input type="text" name="text"> <i class="fa fa-search" aria-hidden="true"></i>

                        </div>
                        <input type="submit" name="submitSearch" class="btn-success">

                    </form>

                </div>

            </div>


        </div>


    </div>
</div>

<div class="footban">
    <div class="container-fluid">
        <div class="bann">
            <div class="bancon">
                <div class="banheader">You need internship?</div>
                <div class="banheader2">Sign up as Company to public your topic</div>
                <div class="banbtn">Sign Up</div>
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
<script type="text/javascript" src="/js/studentinfo.js"></script>
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
