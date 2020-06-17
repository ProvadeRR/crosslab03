<?php
$translateEXIT = [
    "ru" => "Выйти",
    "uk" => "Вийти",
    "en" => "Exit",
];
?>
<form action="../guest/isAuth/logout.php" method="POST">
<button type="submit"  class="btn btn-primary" name="exit"><?php echo $translateEXIT[$_SESSION['lang']]; ?></button>
</form>