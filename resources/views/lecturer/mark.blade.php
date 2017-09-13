<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mark Student</title>
</head>
<body>
@if($mark->mark_lecturer != null)
    <h2>Student {{$mark->student_id}} </h2>

    <ul>
        <li> Mark: {{$mark->mark_lecturer}} </li>
        <li> Evaluation: {{$evaluation->content_lecturer}}</li>
        <li> Mark & evaluate by lecturer: {{$mark->lecturer_id}}</li>
    </ul>
@else
    @if($report->status != "Submitted")
        This student haven't submitted the final report yet!
        <br>
        <br>
        <form action="{{$report->student_id}}" method="post">
            {{ csrf_field() }}
            <input type="text" name="evaluation">
            <select name="mark">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
    @else
        This student has submitted the final report. Clink here to download !!!
        <br><br>
        <form action="{{$report->student_id}}" method="post">
            {{ csrf_field() }}
            <input type="text" name="evaluation">
            <select name="mark">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
    @endif
@endif
</body>
</html>
