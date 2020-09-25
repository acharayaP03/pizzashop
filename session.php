<?php
if (isset($_POST['submit'])) {

    //set cookiew
    setcookie('gender', $_POST['gender'], time() + 86400);

    //start the session if there is post.
    session_start();

    $_SESSION['name'] = $_POST['name'];

    //echo $_SESSION['name'];

    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
<h4 class="center grey-text">Pizzas!</h4>

<div class="container center grey-text">
    <form class="white col s12 md6" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="row">
            <div class="input-field col s12 md6">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="name" class="validate">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 md6">
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <label>Materialize Select</label>
            </div>
        </div>
        <div class="card-action center">
            <input type="submit" class="btn brand z-depth-0" name="submit" value="login">
        </div>
    </form>
</div>
<?php include('templates/footer.php'); ?>

</html>