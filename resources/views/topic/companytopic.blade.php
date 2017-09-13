<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/companytopic.css')}}">
    <script src="{{asset('https://use.fontawesome.com/f5c1a979a9.js')}}"></script>
    <script src="/js/react.min.js"></script>
    <script src="/js/JSXTransformer.js"></script>

    <script type="text/jsx" src="/js/chooselevelreact.js"></script>
    <style type="text/css">
      div.inline { float:left; }
        .clearBoth { clear:both; }
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
        <div class="col-md-3 sidebar">
            <div class="studentpicture">
                <img src="{{asset('images/ava_1.png')}}" alt="" class="img-responsive"/>

            </div>

            <div class="selections">
                <ul>
                    <li><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <a href="/company/representation/{{\Illuminate\Support\Facades\Auth::user()->user_id}}">User
                            infomation</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/topic">Topic</a></li>
                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i><a href="/company/assign">Student Assign</a>
                    </li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="/company/instructor/create">Create
                            Instructor Account</a></li>

                </ul>


            </div>


        </div>

        <div class="col-md-9 maincontent">
            <div class="tab">
                <button class="tablinks" onclick="companytopictab(event, 'companytopic')"><i class="fa fa-book"
                                                                                             aria-hidden="true"></i>
                    Topic
                </button>
                <button class="tablinks" onclick="companytopictab(event, 'createcompanytopic')"><i class="fa fa-cog"
                                                                                                   aria-hidden="true"></i>
                    Create a new Topic
                </button>
            </div>

            <div id="companytopic" class="tabcontent">
                <div class="tab1">
                    <div class="topicheader">
                        <i class="fa fa-book" aria-hidden="true"></i> All Topic

                    </div>

                    <div class="topicsum">
                        There are {{$count}} topics
                    </div>
                    <div class="practicetable">

                        <table style="width:100%">
                            <tr>
                                <th>Topic title</th>
                                <th>Publish date</th>
                                <th>Status</th>
                            </tr>

                            @foreach($companyTopic as $cTopic)
                                <tr>
                                    <th>{{$cTopic->title}}</th>
                                    <th>{{$cTopic->created_at}}</th>
                                    <th>{{$cTopic->status}}</th>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                        {{ $companyTopic->links() }}
                    <div class="practicetable">

                        <table style="width:100%">
                            <tr>
                                <th>Practice title</th>
                                <th>Publish date</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>How to code PHP</td>
                                <td>January 11</td>
                                <td>On progress</td>
                            </tr>
                            <tr>
                                <td>System will close on June 17</td>
                                <td>April 19</td>
                                <td>On progress</td>
                            </tr>
                            <tr>
                                <td>How to code PHP</td>
                                <td>January 11</td>
                                <td>On progress</td>
                            </tr>
                            <tr>
                                <td>How to code PHP</td>
                                <td>January 11</td>
                                <td>On progress</td>
                            </tr>
                            <tr>
                                <td>How to code PHP</td>
                                <td>January 11</td>
                                <td>On progress</td>
                            </tr>
                            <tr>
                                <td>How to code PHP</td>
                                <td>January 11</td>
                                <td>On progress</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>

            <div id="createcompanytopic" class="tabcontent">
                <div class="tab2">
                    <form action="" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="createtopicheader"><i class="fa fa-star" aria-hidden="true"></i> Create a
                                    new
                                    Topic
                                </div>
                            </div>

                            <div class="topiccreateform">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="topictitle">
                                            <div class="topicformtitle"><i class="fa fa-pencil-square-o"
                                                                           aria-hidden="true"></i> Topic title
                                            </div>
                                            <div class="topictitlefield">
                                                <input type="text" name=" title" value=""><br>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="topicid">
                                            <div class="topicformtitle"><i class="fa fa-dot-circle-o"
                                                                           aria-hidden="true"></i> Topic ID
                                            </div>
                                            <div class="topicidfield">
                                                <input type="text" name=" topic_id" value=""><br>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="topiccontent">
                                            <div class="topicformtitle"><i class="fa fa-file-code-o"
                                                                           aria-hidden="true"></i> Topic content
                                            </div>
                                            <div class="topiccontentfield">
                                                <textarea rows="10" cols="50" placeholder="Type your entry here"
                                                          class="content" name="topic_content"></textarea>

                                            </div>


                                        </div>


                                    </div>

                                    <div class="col-md-12">
                                        <div class="topicquantity">
                                            <div class="topicformtitle"><i class="fa fa-handshake-o"
                                                                           aria-hidden="true"></i> Quantity
                                            </div>
                                            <div class="topicquantityfield">
                                                <input type="text" name="quantity" value="">
                                                <div class="sll">Student(s)</div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="topicrequire">
                                            <div class="topicformtitle"><i class="fa fa-exclamation"
                                                                           aria-hidden="true"></i> Other requirements
                                            </div>
                                            <div class="topicrequirefield">
                                                <input type="text" name="otherRequire" value=""><br>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="choose">
                                        <div class="studentskillsform">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="formtitle" style="margin-left: 30px;">Skills</div>
                                                    <div class="skilllistform">
                                                      <div class="inline">
                                                        <span class="custom-dropdown big">
                                                        Skill 1 : <select name="skills_name[]">
                                                          <?php
                                                          $allSkill = DB::table('skills')->get();
                                                          ?>
                                                          <option value="">Choose Skills</option>
                                                            @foreach($allSkill as $as)
                                                                <option name="skills_name[]"
                                                                        value="{{$as->name}}">{{$as->name}}</option>
                                                            @endforeach
                                                         </select>
                                                        </span>

                                                        <div id="skills1" ></div>
                                                      </div>
                                                      <div class="inline">
                                                        <span class="custom-dropdown big">
                                                        Skill 2: <select name="skills_name[]">
                                                          <?php
                                                          $allSkill = DB::table('skills')->get();
                                                          ?>
                                                          <option value="">Choose Skills</option>
                                                            @foreach($allSkill as $as)
                                                                <option name="skills_name[]"
                                                                        value="{{$as->name}}">{{$as->name}}</option>
                                                            @endforeach
                                                         </select>
                                                        </span>
                                                        <div id="skills2" ></div>
                                                      </div>
                                                      <div class="inline">
                                                        <span class="custom-dropdown big">
                                                        Skill 3: <select name="skills_name[]">
                                                          <?php
                                                          $allSkill = DB::table('skills')->get();
                                                          ?>
                                                          <option value="">Choose Skills</option>
                                                            @foreach($allSkill as $as)
                                                                <option name="skills_name[]"
                                                                        value="{{$as->name}}">{{$as->name}}</option>
                                                            @endforeach
                                                         </select>
                                                        </span>
                                                        <div id="skills3" >

                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="studentskillsform">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="formtitle" style="margin-left: 30px;">Field</div>
                                                    <div class="skilllistform" style="margin-left: 20px">
                                                        @include('layouts.dropdown_field')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" placeholder="id"
                                           value="{{Auth::user()->user_id}}" readonly>


                                </div>
                                <div class="row finishbtn">
                                    <div class="col-md-6">
                                        <button type="reset" class="clearallbtn">CLEAR ALL</button>
                                    </div>

                                    <div class="col-md-6">
                                        <button class="submitbtn" type="submit"> Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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


<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('js/companytopic.js')}}"></script>
<script>
    function companytopictab(evt, cityName) {
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
