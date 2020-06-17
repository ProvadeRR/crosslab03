<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: ../../");
}
include "../../blocks/header.php";
?>
<div class="container d-flex align-items-center justify-content-center" style="width:500px;height:100vh;">
    <form action="auth.php" method="POST" style="width:400px;text-align:center">
        <div>
            <h2> Signup </h2>
            <?php
            if (isset($_SESSION['inputLogin'])) : ?>
                <input type="text" name="login" class="form-control" value="<?php echo $_SESSION['inputLogin'];
                                                                            unset($_SESSION['inputLogin']); ?>">
            <?php else : ?>
                <input type="text" name="login" class="form-control" placeholder="Login">
            <?php endif; ?>
        </div>
        <div>
            <input type="password" name="password" class="form-control mt-2 mb-2" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-2">Signup</button>
        <span>
            <?php if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            } ?>
            <span>
    </form>

</div>

<?php include "../../blocks/footer.php";
