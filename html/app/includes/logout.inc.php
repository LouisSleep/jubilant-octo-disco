<?php
session_start();
session_destroy();
echo 'logout !!';
header("Location: ../pages/home.php");
