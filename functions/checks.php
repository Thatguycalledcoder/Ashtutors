<?php
    function checkLogin() {
        if (!(isset($_SESSION["login_sts"]))) {
            header("Location: dirname(__FILE__)./../login/login.php");
        }
    }

    function checkLogout() {
        if (isset($_GET["logout"])) {
            session_unset();
            session_destroy();
            header("Location: dirname(__FILE__)./../login/login.php");
        }
    }

    function checkAdmin() {
        if (!isset($_SESSION["admin_sts"])) {
            header("location: dirname(__FILE__)./../login/login.php");
        }
    }

    function checkAdminLogout() {
        if (isset($_GET["logout"])) {
            session_unset();
            session_destroy();
            header("Location: dirname(__FILE__)./../login/login.php");
        }
    }
?>