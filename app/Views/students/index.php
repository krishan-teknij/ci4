<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    <h1>Student List</h1>

    <a href="/students/create">Add Student</a>

    <?php if (session()->getFlashdata('message')): ?>
        <p><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>#</th> <!-- Replace ID with a counter column -->
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $currentPage = $pager->getCurrentPage(); // Get current page number
            $perPage = $pager->getPerPage();        // Records per page

            // Calculate the starting number for the counter on the current page
            $counter = ($currentPage - 1) * $perPage + 1;

            foreach ($students as $student): ?>
                <tr>
                    <td><?= $counter++ ?></td> <!-- Display and increment counter -->
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['phone'] ?></td>
                    <td>
                        <a href="/students/edit/<?= $student['id'] ?>">Edit</a>
                        <a href="/students/delete/<?= $student['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <p>
        <?= $pager->links() ?>
    </p>
</body>
</html>
