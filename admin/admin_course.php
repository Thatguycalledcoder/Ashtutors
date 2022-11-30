<?php
    session_start();
    require_once dirname(__FILE__)."/../functions/major_course_fnx.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
</head>
<body class="container">
    <header>
    <a href="admin.php">Back to admin page</a>
        <h1>
            Courses
        </h1>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#AddCourserModal">
            Add Course +
        </button>
        <div class="modal fade" id="AddCourserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../actions/course_actions.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="course" class="col-form-label">Course name:</label>
                            <input type="text" name="new_course" class="form-control" id="course" required>
                        </div>
                        <div class="mb-3">
                            <label for="major" class="col-form-label">Course Major:</label>
                            <select name="major_id" class="form_control" id="major" required>
                                <?php
                                    displayMajorOptions();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-success">Add Course</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </header>
    <table>
        <thead>
            <tr>
                <td>Course</td>
                <td>Department</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php
                displayCourses();
            ?>
        </tbody>
    </table>
</body>
</html>