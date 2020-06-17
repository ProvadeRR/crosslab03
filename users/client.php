<?php
session_start();
include "infouser.php";
include "$redirect";
include "../blocks/header.php";
echo $obj->Hello()[$lang];
?>
 <?php include "../blocks/changelanguage.php"; ?>
 <?php include "../blocks/exit.php";?>
<?php include "../blocks/footer.php"; ?>

