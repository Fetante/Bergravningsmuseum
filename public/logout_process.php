<?php

include('../config/config.php');

unset($_SESSION["user"]);
unset($_SESSION["role"]);

setFlashMessage("success", "You have logged out");
header("Location: login.php");
exit();
