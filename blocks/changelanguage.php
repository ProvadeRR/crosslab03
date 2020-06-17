<?php
$changeLanguageSHOW = [
    "ru" => "Ваш язык",
    "uk" => "Ваша мова",
    "en" => "Your Language",
];
$languageCHANGENAME = [
    "ru" => "Русский",
    "uk" => "Українська",
    "en" => "English",
];
?>
<br>
<span><?php echo $changeLanguageSHOW[$_SESSION['lang']]; ?> </span>
<select id="select" class="mt-2 mb-3">
    <option <?php if($_SESSION['lang'] == "ru"){echo "selected";}?> value="ru">Русский</option>
    <option <?php if($_SESSION['lang'] == "en"){echo "selected";}?> value="en">English</option>

    <option <?php if($_SESSION['lang'] == "uk"){echo "selected";}?> value="uk">Український</option>

    <button id="submit"></button>
</select>
