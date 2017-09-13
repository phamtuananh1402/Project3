<html>
    <title>Create User</title>
    <body>
        <h2>Create new user</h2>
        <form action="create" method="POST">
            <input type="text" name="msuser"> <br>
            <select name="role">
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
                <option value="manager">Teacher incharge</option>
            </select>
            <br>
            <input type="submit" name="submit">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </body>
</html>