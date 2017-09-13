<html>
<head>
    <title>Period {{$period_id}}</title>
</head>
<body>
<h2>Period {{$period_id}}</h2>
<ol>
    @foreach($studentsInPeriod as $student)
        <li>
            SSID: {{$student->student_id}} <a href="{{$period_id}}/remove/{{$student->student_id}}">Remove from this period</a>
        </li>
    @endforeach
</ol>

<h2> List of students that are available for add to this period</h2>
<ol>
    @foreach($students as $student)
        <li>
            SSID: {{$student->student_id}} <a href="{{$period_id}}/add/{{$student->student_id}}">Add to this period</a>
        </li>
    @endforeach
</ol>
</body>
</html>