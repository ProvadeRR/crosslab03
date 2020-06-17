<?php
session_start();
$language = [
    "uk" => "Український",
    "ru" => "Русский",
    "en" => "Englsh",
];
include "../../blocks/header.php";
?>
<form action="script.php" class="ml5" method="POST">
    <p>Please select your native language</p>
    <?php foreach($language as $key => $lang):?>
    <button type="submit" class="btn btn-outline-primary mr-2" value=<?php echo $key?> name ="lang"><?php echo $lang;?> </buttom>
    <?php endforeach; ?>
</form>

<?php include "../../blocks/footer.php";