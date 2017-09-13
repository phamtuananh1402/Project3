<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>THIS IS OUTLINE TEMPLATE</h1>

<?php
$link = "https://doc-04-1s-docs.googleusercontent.com/docs/securesc/rddfmup9rq43sh87fo64oc8rjilcqmev/ejngburvi4t0bfifsilqdou9uo89k9io/1491033600000/08866783450542218166/08866783450542218166/0B3kSVSFCDynPd3RHSi12blZGaUU?e=download";

?>
YOU CAN DOWNLOAD THE Outline FORM <a href="{{$link}}">HERE</a><br>

@foreach($stdInstructor as $stdI)
    <form method="POST" action="/company/outline">
        {{csrf_field()}}
        <input type="file" name="link"> Choose File <br>
        <h2>
            This Outline for student: </h2> <input type="text" name="student_id" value="{{$stdI->student_id}}"
                                                   readonly>
        <h2>With Topic
            <ul>

                @foreach($topic as $top)
                    <li>{{$top->title}} <input type="checkbox" name="topic_id[]" value="{{$top->topic_id}}"></li>
                @endforeach

            </ul>
        </h2>

        <h2>Submit by</h2><input type="text" name="instructor_id" value="{{Auth::user()->user_id}}">
        <button class="submitbtn" type="submit"> Submit</button>
        <br>
    </form>
@endforeach
</body>
</html>