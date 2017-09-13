<html>
<head>
    <title>View Students</title>
</head>
<body>
<ul>
    @foreach($students as $student)
        <li>First Name : {{$student->first_name}} | Last Name : {{$student->last_name}} | Email : {{$student->email}} | User ID : {{$student->student_id}} | Class: {{$student->class}} | Status: {{$student->status}} | Mark: </li>
    @endforeach
</ul>
</body>
</html>