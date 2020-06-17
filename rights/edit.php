<?php
session_start();
include "../users/infouser.php";
include "$redirect";
if ($role != 3) {
    if(isset($role))
    {
        exit(header('Location: /error404/'));
    }
}
$id = $_POST['edit'];

$userInfo = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$id'");
$currentUser = mysqli_fetch_assoc($userInfo);

$translater = [
    'title' => [
        'ru' => 'Редактировать пользователя',
        'en' => 'Edit user',
        'uk' => 'Редагувати користувача',
    ],
    'name' => [
        'ru' => 'Введите новое имя',
        'en' => 'Enter a new name',
        'uk' => 'Введіть нове ім`я',
    ],
    'surname' => [
        'ru' => 'Введите новую фамилию',
        'en' => 'Enter a new last name',
        'uk' => 'Введіть нове прізвище',
    ],
    'login' => [
        'ru' => 'Введите новый логин',
        'en' => 'Enter new login',
        'uk' => 'Введіть новий логін',
    ],
    'lang' => [
        'ru' => 'Выберите новый язык',
        'en' => 'Choose a new lanukge',
        'uk' => 'Виберіть нову мову',
        'select' => [
            'ru' => ['Русский', 'Английский', 'Украинский'],
            'en' => ['Russian', 'English', 'Ukrainian'],
            'uk' => ['Русский', 'Англійська', 'Український'],
        ]
    ],
    'role' => [
        'ru' => 'Выберите новую роль',
        'en' => 'Choose a new role',
        'uk' => 'Виберіть нову роль',
        'select' => [
            'ru' => ['Клиент', 'Менеджер', 'Администратор'],
            'en' => ['Client', 'Manager', 'Admin'],
            'uk' => ['Клієнт', 'Менеджер', 'Адміністратор'],
        ]
    ],

];
?>
<div class="container">
    <div class="form-auth-inner shadow p-5 bg-white rounded mt-4">
        <h3><?php echo $translater['title'][$lang] . ' ' . $currentUser['name'] . ' ' . $currentUser['surname']; ?></h3>
        <form method="POST" action="editUser.php">
            <div class="form-group">
                <label><?php echo $translater['name'][$lang] ?></label>
                <input value="<?php echo $currentUser['name'] ?>" type="text" class="form-control error" name="name">
            </div>
            <div class="form-group">
                <label><?php echo $translater['surname'][$lang] ?></label>
                <input value="<?php echo $currentUser['surname'] ?>" type="text" class="form-control" name="surname">
            </div>
            <div class="form-group">
                <label><?php echo $translater['login'][$lang] ?></label>
                <input value="<?php echo $currentUser['login'] ?>" type="text" class="form-control" name="login">
            </div>
            <div class="form-group">
                <label><?php echo $translater['lang'][$lang] ?></label>
                <select class="custom-select" name="lang">
                    <option <?php if ($currentUser['lang'] == 'ru') echo "selected"; ?> value="ru"><?php echo $translater['lang']['select'][$lang][0] ?></option>
                    <option <?php if ($currentUser['lang'] == 'en') echo "selected"; ?> value="en"><?php echo $translater['lang']['select'][$lang][1] ?></option>
                    <option <?php if ($currentUser['lang'] == 'uk') echo "selected"; ?> value=uk"><?php echo $translater['lang']['select'][$lang][2] ?></option>
                </select>
            </div>
            <div class="form-group">
                <label><?php echo $translater['role'][$lang] ?></label>
                <select class="custom-select" name="role">
                    <option <?php if ($currentUser['role'] == '1') echo "selected"; ?> value="1"><?php echo $translater['role']['select'][$lang][0] ?></option>
                    <option <?php if ($currentUser['role'] == '2') echo "selected"; ?> value="2"><?php echo $translater['role']['select'][$lang][1] ?></option>
                    <option <?php if ($currentUser['role'] == '3') echo "selected"; ?> value="3"><?php echo $translater['role']['select'][$lang][2] ?></option>
                </select>
            </div>
            <div class="form-group text-right">
                <a href="privelegy.php" class="btn btn-outline-secondary">Отмена</a>
                <button name='number' value="<?php echo $id ?>" type="submit" class="btn btn-success text-white">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<?php
include "../blocks/footer.php";

