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

@foreach($studentFailed as $std)
    @if($std->created_at > $failed_time)
        <?php
        $stdId = $std->student_id;
        $markFailed = DB::table('mark')->where('student_id', $stdId)->update(['mark_lecturer' => 'F']);
        ?>
    @endif

@endforeach
</body>
</html>