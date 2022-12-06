<?php
session_start();
require_once dirname(__FILE__) . "/../../functions/major_course_fnx.php";
require_once dirname(__FILE__)."/../../controllers/tutor_controller.php";
require_once dirname(__FILE__)."/../../functions/checks.php";

    checkLoginTutor();

$info = getTutorDetails($_SESSION["id"]);
if ($info["tutor_image"] == "null") {
    $info["tutor_image"] = "../images/icons/user-default.png";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
            <section class="main-sec divider">
                <span></span>
                <h1 class="spacer" style="margin-left: 16px">
                    <?php echo $_SESSION["name"] ?>
                </h1>
                <span></span>
            </section>
        </header>
        <section class="main-sec">
            <figure>
                <div id="img-frame"> 
                    <button type="button" data-bs-toggle="modal" data-bs-target="#changeImageModal" class="btn-img-upload">
                        <img class="img-upload-border" id="single-img" src="<?php echo "./../" . $info["tutor_image"] ?>" alt="Profile image" title="Upload image">
                    </button>
                    <div class="modal fade" id="changeImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Change profile image</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../../actions/tutor_actions.php" enctype="multipart/form-data" method="POST">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="img" class="col-form-label">Upload image:</label>
                                        <input type="file" name="profile_img" accept="image/*" class="form-control" id="img" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="tutor_id" value="<?php echo $_SESSION["id"] ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="update_image" class="btn btn-success">Upload Image</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <figcaption class="tutor-one">
                    <ul class="account-details">
                        <form class="book-form" action="../../actions/tutor_actions.php" method="POST">
                            <li>
                                First Name:
                               <input type="text" name="new_fname" value="<?php echo $info["tutor_fname"] ?>" required>
                            </li>
                            <li>
                                Last Name:
                                <input type="text" name="new_lname" value="<?php echo $info["tutor_lname"] ?>" required>
                            </li>
                            <li>
                                Email:
                                <input type="email" name="new_email" value="<?php echo $info["tutor_email"] ?>" required>
                            </li>
                            <li>
                                Country:
                                <input type="text" name="new_country" value="<?php echo $info["tutor_country"] ?>" required>
                            </li>
                            <li>
                                Year:
                                <input type="text" name="new_year" value="<?php echo $info["tutor_year"] ?>" required>
                            </li>
                            <li>
                                Major:
                                <select name="major_id" required>
                                    <?php
                                        displayMajorOptions();
                                    ?>  
                                </select>
                            </li>
                            <li>
                                Contact:
                                <input type="tel" name="new_contact" value="<?php echo $info["tutor_contact"] ?>" required>
                            </li>
                            <input type="hidden" name="tutor_id" value="<?php echo $_SESSION["id"] ?>">
                            <button type="submit" name="update_profile" class="update-btn">Update Profile</button>
                        </form>
                    </ul>
                </figcaption>
            </figure>
        </section>
        <footer>

        </footer>
    </main>
</body>

</html>