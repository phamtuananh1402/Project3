<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
</head>
<body>
<h1> Student List:</h1>

<ol>
    @foreach($studentId as $sid)

        <li>First Name: {{$sid->first_name}} | Last name: {{$sid->last_name}} | Gender: {{$sid->gender}} | Student ID: {{$sid->student_id}}| <a href="/lecturer/mark/{{$sid->student_id}}">Mark</a></li>

    @endforeach
</ol>

</body>
</html>