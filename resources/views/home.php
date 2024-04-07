<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-column {
            width: 100px;
        }

        .action-column a {
            margin-right: 5px;
        }

        .add-link {
            display: block;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1>Welcome to the Home Page</h1>
        <!-- Trigger Create modal -->
        <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add New Record
        </button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th class="action-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td class="action-column">
                            <a class="btn btn-danger btn-sm m-1" href="/delete?id=<?php echo $user['id']; ?>">Delete</a>
                            <a class="btn btn-info btn-sm m-1" href="/edit?id=<?php echo $user['id']; ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <!-- Create Modal -->

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Record</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/create">
                            <label class="text" for="name">Role:</label>
                            <input class="form-control" type="text" id="role" name="role">
                            <label class="text" for="name">Email:</label>
                            <input class="form-control" type="email" id="email" name="email">
                            <label class="text" for="name">Password:</label>
                            <input class="form-control" type="password" id="password" name="password">
                            <button class="btn btn-success mt-2" type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>