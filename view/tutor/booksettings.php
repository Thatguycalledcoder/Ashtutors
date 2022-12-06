<?php
    require_once dirname(__FILE__)."/../../functions/tutor_view_fxn.php";
    require_once dirname(__FILE__)."/../../functions/general_display.php";
    require_once dirname(__FILE__)."/../../functions/checks.php";
    session_start();

    checkLoginTutor();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor: Book Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
</head>
<body>
    <nav>
        <ul class="navi">
            <li class="nav-links">
                <a href="index.php">
                    <img class="navcons" src="./../../images/icons/home-icon.svg" alt="Home" title="Home">
                </a>
            </li>
            <li class="nav-links">
                <a href="booksettings.php">
                    <img class="navcons" src="./../../images/icons/settings-icon.svg" alt="Booking Settings" title="Booking Settings">
                </a>
            </li>
            <li class="nav-links">
                <a href="tutorprofile.php">
                    <img class="navcons" src="./../../images/icons/tutor-icon.svg" alt="Tutor profile" title="Tutor Profile">
                </a>
            </li>
            <li class="nav-links">
                <a href="index.php?logout=1">
                    <img class="navcons" src="./../../images/icons/logout-icon.svg" alt="Logout" title="Logout">
                </a>
            </li>
        </ul>
    </nav>
    <main>
        <header>
        <figure class="head-fig">
                <img class="head-img" src="" alt="Header image">
            </figure>
            <section class="main-sec">
                <h1>
                    Booking Settings
                </h1>
            </section>
        </header>
        <section class="main-sec mb-5">
            <header>
                <h3>
                    Your Availability
                </h3>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#AddAvailableTimeModal" style="width: 185px;">
                     Add Available time +
                </button>
                <div class="modal fade" id="AddAvailableTimeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add a new available time</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../actions/tutor_actions.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="day" class="col-form-label">Available day:</label>
                                    <select name="book_day" id="day">
                                        <?php
                                            displayBookDays();
                                        ?>
                                    </select>
                                </div>
                                <div class="row g-3 mb-3">
                                    <h5>Available time:</h5>
                                    <div class="col">
                                        <label for="day" class="col-form-label">From:</label>
                                        <input type="time" name="to_time" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label for="day" class="col-form-label">To:</label>
                                        <input type="time" name="fro_time" class="form-control" required>
                                    </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="tutor_id" value="<?php echo $_SESSION["id"] ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add_date" class="btn btn-success">Add available date</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </header>
            <table class="table">
                <thead>
                    <tr>
                        <td>Available day</td>
                        <td>Available Time</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        displayTutorAvailableDays($_SESSION["id"]);
                    ?>
                </tbody>
            </table>
        </section>
        <section class="main-sec">
            <header>
                <h3>
                    Your Courses for Tutoring
                </h3>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#AddCourseTimeModal">
                     Add a course +
                </button>
                <div class="modal fade" id="AddCourseTimeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add a course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../../actions/tutor_actions.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="day" class="col-form-label">Course:</label>
                                    <select name="course" id="day">
                                        <?php
                                            displayCourses();
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="rate" class="col-form-label">Rate (per hour):</label>
                                    <input type="number" name="rate" id="rate" min="0" step="0.50" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="tutor_id" value="<?php echo $_SESSION["id"] ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add_course" class="btn btn-success">Add available date</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </header>
            <table class="table">
                <thead>
                    <tr>
                        <td>Course</td>
                        <td>Rate (per hour)</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        displayTutorCourses($_SESSION["id"]);
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>