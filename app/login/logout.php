<?php
session_start();
if (session_destroy()) {
    header("Location:  ../../app/user/shopdungct.php");
}
