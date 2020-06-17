<?php
session_start();
include "infouser.php";
include "$redirect";
if ($role != 3) {
    exit(header('Location: /error404/'));
}
include "../blocks/header.php";
echo $obj->Hello()[$lang] . '<br>';
echo $obj->DrawPanel($lang);
include "../blocks/changelanguage.php"; 
include "../blocks/exit.php";
include "../blocks/footer.php";

