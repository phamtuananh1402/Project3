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
<h1>Waiting Student</h1>
@foreach($waitingStudent as $ws)

    <h2>{{$ws->student_id}}</h2>

@endforeach

@foreach($topic as $top)
    <h1>{{$top->topic_id}}</h1>
@endforeach

@foreach($company as $com)
    <h1>{{$com->company_name}}</h1>
@endforeach
</body>
</html>