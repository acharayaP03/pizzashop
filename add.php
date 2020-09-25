<?php

include('config/db_connect.php');

$email = $title = $ingredients = '';

$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    /* echo '<pre>';
            print_r($_POST);
        echo '</pre>'; */

    if (empty($_POST['email'])) {
        $errors['email'] = "An email is required." . '<br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email must be a valid email address.';
        }
        //echo  htmlspecialchars($_POST['email']);
    }
    if (empty($_POST['title'])) {
        $errors['title'] =  "An title is required." . '<br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = "title must be letters and spaces only.";
        }
        //echo  htmlspecialchars($_POST['title']);
    }
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] =  "At leat one ingredient is required." . '<br />';
    } else {
        $ingredients = $_POST['ingredients'];

        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = "Ingredents must be comma separated list";
        }
        //echo  htmlspecialchars($_POST['ingredients']);
    }

    # chech if the error array is empty, if not then redirect to other page.

    if(array_filter($errors)){
       // echo "There are errors in the form. Please fix it.";
    }else{

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')"; 
        if(mysqli_query($conn, $sql)){
            //echo " form is valid";
            header('Location: index.php');
            //success
        }else{
            echo 'Qeury Failed. ' . mysqli_error($conn);
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>

    <form action="add.php" method="POST" class="white" autocomplete="off">
        <label for="email">You Email</label>
        <input type="text" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
        <div class="red-text">
            <?= $errors['email'] ?>
        </div>

        <label for="title">Pizza Title</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($title) ?>">
        <div class="red-text">
            <?= $errors['title'] ?>
        </div>

        <label for="ingredients">Ingredients (Comma separated)</label>
        <input type="text" name="ingredients" id="ingredients" value="<?= htmlspecialchars($ingredients) ?>">
        <div class="red-text">
            <?= $errors['ingredients'] ?>
        </div>
        <div class="card-action center">
            <input type="submit" class="btn brand z-depth-0" name="submit" value="submit">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>
</body>