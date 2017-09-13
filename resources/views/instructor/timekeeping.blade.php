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
<h1>this is timekeeping template</h1><br><br>
<?php
$link = "https://doc-10-1s-docs.googleusercontent.com/docs/securesc/rddfmup9rq43sh87fo64oc8rjilcqmev/edd0ni6v0v23a6kfj202vg8fsaa95t6b/1491026400000/08866783450542218166/08866783450542218166/0B3kSVSFCDynPbDNBbGppNWl6dDA?e=download&nonce=c92hfa6q2jn7m&user=08866783450542218166&hash=fqhoplqhorifel178q7kp9muk7fhbkho";

?>
YOU CAN DOWNLOAD THE TIMEKEEPING FORM <a href="{{$link}}">HERE</a><br>

@foreach($stdInstructor as $stdI)
    <form method="POST" action="/instructor/timekeeping">
        {{csrf_field()}}
        <input type="file" name="link"> Put Link Here <br>
        <h2>This timeKeeping for student: </h2> <input type="text" name="student_id" value="{{$stdI->student_id}}"
                                                       readonly>
        <h2>Submit by</h2><input type="text" name="instructor_id" value="{{Auth::user()->user_id}}">
        <button class="submitbtn" type="submit"> Submit</button>
        <br>
    </form>
@endforeach
</body>
</html>