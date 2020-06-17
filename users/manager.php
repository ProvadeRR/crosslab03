<?php
session_start();
include "infouser.php";
include "$redirect";
if ($role == 1) {
    exit(header('Location: /error403/'));
}
include "../blocks/header.php";
echo $obj->Hello()[$lang] . '<br>';
echo $obj->DrawPanel($lang);
?>

<?php include "../blocks/changelanguage.php";?>
<?php include "../blocks/exit.php";?>
 <?php include "../blocks/footer.php"; ?>

