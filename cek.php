<?php
if(isset($_SESSION['role'])){
} else {
    header('location:login.php');
}
?>