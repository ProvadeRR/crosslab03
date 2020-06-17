<?php
session_start();
include "../users/infouser.php";
include "$redirect";
if ($role < 2) {
    if(isset($role))
    {
        exit(header('Location: /error404/'));
    }
}
$translater = [
    'message-remove' => [
        'ru' => 'Пользователь был успешно удален.',
        'en' => 'User has been successfully deleted.',
        'uk' => 'Користувач був успішно видаленний.',
    ],
];
if(isset($_POST['remove']))
{
    $id = $_POST['remove'];
    $remove = mysqli_query($database->connect(), "DELETE FROM `users` WHERE `id` = '$id'");
    echo $translater['message-remove'][$lang];
}
if(isset($_SESSION['message-edit']))
{
    echo $_SESSION['message-edit'];
    unset($_SESSION['message-edit']);
}
else if(isset($_SESSION['err']))
{
    echo $_SESSION['message-err'];
    unset($_SESSION['message-err']);
}


$translateLogin = [
    "ru" => "Логин",
    "en" => "Login",
    "uk" => "Логiн",
];
$translateName = [
    "ru" => "Имя",
    "en" => "Name",
    "uk" => "Ім'я",
];
$translateSurname = [
    "ru" => "Фамилия",
    "en" => "Surname",
    "uk" => "Фамілія",
];
$translateLanguage = [
    "ru" => "Язык",
    "en" => "Language",
    "uk" => "Мова",
];
$translateRole = [
    "ru" => "Роль",
    "en" => "Role",
    "uk" => "Роль",
];
$translate = [
    'lang' => [
        'ru' => [
            'ru' => 'Русский',
            'en' => 'Английский',
            'uk' => 'Украинский',
            'no' => "Не выбрано"
        ],
        'uk' => [
            'ru' => 'Росiйська',
            'en' => 'Англiйська',
            'uk' => 'Українська',
            'no' => "Не вибрано"
        ],
        'en' => [
            'ru' => 'Russian',
            'en' => 'English',
            'uk' => 'Ukrainian',
            'no' => "Not chosen"
        ],
    ],
    'role' => [
        'ru' => [
            '3' => 'Администратор',
            '2' => 'Менеджер',
            '1' => 'Клиент',
        ],
        'uk' => [
            '3' => 'Адмiнiстратор',
            '2' => 'Менеджер',
            '1' => 'Клієнт',
        ],
        'en' => [
            '3' => 'Admin',
            '2' => 'Manager',
            '1' => 'Client',
        ],
    ],
    'edit' => [
        'ru' => "Редактировать",
        'en' => "Edit",
        'uk' => "Редагувати",
    ],
    'remove' =>[
        'ru' => "Удалить",
        'en' => "Remove",
        'uk' => "Видалити",
    ]
];
?>
<table class="table table-bordered table-inverse ">
  <thead>
    <tr>
      <th>#</th>
      <th><?php echo $translateLogin[$lang];?></th>
      <th><?php echo $translateName[$lang];?></th>
      <th><?php echo $translateSurname[$lang];?></th>
      <th><?php echo $translateLanguage[$lang];?></th>
      <th><?php echo $translateRole[$lang];?></th>
      <?php if($role==3){
          echo '<th>'.$obj->act()[$lang].'</th>';
          }?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      $users = mysqli_query($database->connect(), "SELECT * FROM `users`");
      while($result = mysqli_fetch_assoc($users))
      {
          echo '<th scope="row">'.$result['id'].'</th>';
          echo '<td>'. $result['login'].'</td>';
          echo '<td>'. $result['name'].'</td>';
          echo '<td>'. $result['surname'].'</td>';
          echo '<td>'. $translate['lang'][$lang][$result['lang']].'</td>';
          echo '<td>'. $translate['role'][$lang][$result['role']].'</td>';
          if($role > 2 && $_SESSION['id'] != $result['id'] && $result['role'] != "3")
          {
              echo '<td>  <form action="edit.php" method="POST">
              <button style="background:none" type="submit" name="edit'.'" value="'. $result['id'].'">'.$translate['edit'][$lang].'</button>
              </form>
              <form action="" method="POST">
              <button style="background:none" type="submit" name="remove'.'" value="'. $result['id'].'">'.$translate['remove'][$lang].'</button>
              </form></td>'; 
              echo '</tr>';
        }
        echo '</tr>';
          }
      ?>
  </tbody>
</table>

<?php

if($role == 3)
{
 echo '<a href="createUser-form.php">Создать пользователя</a>';
}
include "../blocks/header.php";
include "../blocks/footer.php"; ?>



