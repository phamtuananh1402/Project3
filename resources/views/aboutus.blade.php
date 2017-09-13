<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Meetup is a free responsive single page bootstrap template by designerdada.com">
    <meta name="author" content="Akash Bhadange">
    <title>SIE Intern - About Us</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/aboutus.css')}}" rel="stylesheet">
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('css/dosis-font.css')}}" rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".side-menu">
<nav class="side-menu">
    <ul>
        <li class="hidden active">
            <a class="page-scroll" href="#page-top"></a>
        </li>
        <li>
            <a href="#home" class="page-scroll">
                <span class="menu-title">Home</span>
                <span class="dot"></span>
            </a>
        </li>
        <li>
            <a href="#speakers" class="page-scroll">
                <span class="menu-title">Our Team</span>
                <span class="dot"></span>
            </a>
        </li>
        <li>
            <a href="#contact" class="page-scroll">
                <span class="menu-title">Contact</span>
                <span class="dot"></span>
            </a>
        </li>

    </ul>
</nav>
<div class="container-fluid">
    <!-- Start: Header -->
    <div class="row hero-header" id="home">
        <div class="col-md-7">
            <img src="{{asset('images/logo.png')}}" href="/home" class="logo">
            <h1>Attend the most awaited Conference of 2015</h1>
            <h3>to start you up with your business!</h3>
        </div>
        <div class="col-md-5 hidden-xs">
            <img src="{{asset('images/rocket.png')}}" class="rocket animated bounce">
        </div>
    </div>
    <!-- End: Header -->
</div>
<div class="container">
    <!-- Start: Desc -->
    <div class="row me-row content-ct">
        <h2 class="row-title">Why Are We Doing This?</h2>
        <div class="col-md-4 feature">
            <span class="ti-marker-alt"></span>
            <h3>To Pass The Subject</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.</p>
        </div>
        <div class="col-md-4 feature">
            <span class="ti-money"></span>
            <h3>Money</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.</p>
        </div>
        <div class="col-md-4 feature">
            <span class="ti-world"></span>
            <h3>People around the globe!</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.</p>
        </div>
    </div>
    <!-- End: Desc -->

    <!-- Start: Speakers -->
    <div class="row me-row content-ct speaker" id="speakers">
        <h2 class="row-title">Meet Our Team</h2>
        <div class="col-md-4 col-sm-6 feature">
            <img src="{{asset('images/speaker-1.png')}}" class="speaker-img">
            <h3>Pham Tuan Anh</h3>
            <p>Pham Tuan Anh is a fullstack developer</p>
            <ul class="speaker-social">
                <li><a href="https://www.facebook.com/tuananh1402"><span class="ti-facebook"></span></a></li>
                <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6 feature">
            <img src="{{asset('images/speaker-2.png')}}" class="speaker-img">
            <h3>Nguyen Bao Anh</h3>
            <p>Nguyen Bao Anh is a fullstack developer</p>
            <ul class="speaker-social">
                <li><a href="https://facebook.com/daebakkaber"><span class="ti-facebook"></span></a></li>
                <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6 feature">
            <img src="{{asset('images/speaker-3.png')}}" class="speaker-img">
            <h3>Le Thien Hung</h3>
            <p>Le Thien Hung is a fullstack developer</p>
            <ul class="speaker-social">
                <li><a href="https://facebook.com/hunglee95"><span class="ti-facebook"></span></a></li>
                <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6 feature" style="margin-left: 190px">
            <img src="{{asset('images/speaker-4.png')}}" class="speaker-img">
            <h3>Do Vu Hiep</h3>
            <p>Do Vu Hiep is a front-end designer</p>
            <ul class="speaker-social">
                <li><a href="https://facebook.com/OkiaHiep"><span class="ti-facebook"></span></a></li>
                <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6 feature">
            <img src="{{asset('images/speaker-5.png')}}" class="speaker-img">
            <h3>Dang Van Long</h3>
            <p>Dang Van Long customize our server</p>
            <ul class="speaker-social">
                <li><a href="https://www.facebook.com/windmmm"><span class="ti-facebook"></span></a></li>
                <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
        </div>

    </div>
    <!-- End: Speakers -->
</div>

<!-- Start: Footer -->
<div class="container-fluid footer" id="contact">
    <div class="row contact">
        <div class="col-md-6 contact-form">
            <h3 class="content-ct"><span class="ti-email"></span> Contact Form</h3>
            <form class="form-horizontal" data-toggle="validator" role="form">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name<sup>*</sup></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="John Doe" required>
                        <div class="help-block with-errors pull-right"></div>
                        <span class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email<sup>*</sup></label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" placeholder="you@youremail.com" required>
                        <div class="help-block with-errors pull-right"></div>
                        <span class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label">Your Message<sup>*</sup></label>
                    <div class="col-sm-9">
                        <textarea id="message" class="form-control" rows="3" required></textarea>
                        <div class="help-block with-errors pull-right"></div>
                        <span class="form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" id="submit" name="submit" class="btn btn-yellow pull-right">Send <span
                                    class="ti-arrow-right"></span></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 col-md-offset-1 content-ct">
            <h3><span class="ti-facebook"></span> Facebook Feed</h3>
            <p><a href="https://www.facebook.com/tuananh1402">#ChuBi</a></p>
            <hr>
            <p><a href="https://facebook.com/hunglee95">#HungLe</a></p>
            <hr>
            <p><a href="https://facebook.com/daebakkaber">#BaoAnh</a></p>
            <hr>
            <p><a href="https://facebook.com/OkiaHiep">#HiepDo</a></p>
            <hr>
            <p><a href="https://www.facebook.com/windmmm">#LongDang</a></p>
            <hr>
        </div>
    </div>
    <div class="row footer-credit">
        <div class="col-md-6 col-sm-6">
            <p>&copy; 2015, <a href="http://www.designerdada.com">DesignerDada.com</a> | All rights reserved.</p>
        </div>
        <div class="col-md-6 col-sm-6">
            <ul class="footer-menu">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms &amp; Condition</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- End: Footer -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/about_usjquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/about_jquery.easing.min.js"></script>
<script src="js/about_us_scrolling-nav.js"></script>
<script src="js/aboutus_validator.js"></script>
<!-- Google Analytics -->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-29231762-2', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>