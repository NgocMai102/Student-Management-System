<?php
    header("Location: index.php");
    unset($_SESSION['role']);
    unset($_SESSION['user']);
    unset($_SESSION['avata']);
    unset($_SESSION['fullname']);
?>