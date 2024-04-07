<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        <form action="/update" method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <input type="hidden" name="old_password" value="<?php echo $user['password']; ?>">
            <label class="text" for="name">Role:</label>
            <input class="form-control" type="text" id="role" name="role" value="<?php echo $user['role']; ?>">
            <label class="text" for="name">Email:</label>
            <input class="form-control" type="text" id="email" name="email" value="<?php echo $user['email']; ?>">
            <label class="text" for="name">Password:</label>
            <input class="form-control" type="password" id="password" name="password">
            <button type="submit" class="btn btn-primary mt-1">Update</button>
        </form>
        <a class="btn btn-info btn-sm mt-3" href="/">Back to Home</a>
    </div>
</body>

</html>