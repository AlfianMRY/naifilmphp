<?php
session_start();
unset($_SESSION['MEMBER']); //hapus session member
header('location:index.php?hal=home');