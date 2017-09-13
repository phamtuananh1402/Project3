<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/listtopic.css">
    <script src="/js/fontawesome.js"></script>

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
        <div class="row">
            <div class="col-md-12">
                <div class="topicheader"> Available Topic</div>
                <div class="headerdes">These are available topic for student to choose. Each one will require one or
                    more skills for you, so read the description carefully and choose one topic that suitable to you.
                </div>

                <div class="studentlogin">
                    <a href=""><img src="images/studentlog.png" alt="" class="img-responsive"/></a>

                </div>

                <div class="topictable">

                    <table style="width:100%">
                        <tr>
                            <th><i class="fa fa-comment-o" aria-hidden="true"></i> Topic name</th>
                            <th><i class="fa fa-black-tie" aria-hidden="true"></i> Company</th>
                            <th><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
                            <th><i class="fa fa-user-plus" aria-hidden="true"></i> Recruit</th>
                        </tr>

                        @foreach($topic as $top)

                            @php
                                $topicId = $top->topic_id;
                                //field
                                $field = DB::table('topic_field')->where('topic_field.topic_id','=',$topicId)->pluck('field_name');
                                $field_name = $field->first();
                                //representation
                                $representation = DB::table('topic')->where('topic.topic_id','=',$topicId)->pluck('representation_id');
                                $rep_id = $representation->first();
                                //company
                                $company = DB::table('company')->where('company_id','=',$rep_id)->pluck('company_name');
                                $company_name = $company->first();

                            @endphp
                            <tr>
                                <td><a href="/topic/{{$top->topic_id}}">{{$top->title}}</a>
                                    <div class="topicnote">Click for more information</div>

                                </td>
                                <td>{{$company_name}}</td>
                                <td>{{$top->created_at}}</td>
                                <td>{{$top->quantity}}</td>
                            </tr>


                        @endforeach

                    </table>
                    {{$topic->links()}}
                </div>

            </div>
        </div>


    </div>
</div>

@include('layouts.subfooter')
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
