<?php
include('config/db_connect.php');

if (isset($_POST['delete'])) {

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete LIMIT 1";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo 'Sorry something went wrong' . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {

    # escape any special char that is sent to db
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //Create a Query 
    $sql = " SELECT * FROM pizzas WHERE id = $id";

    # since we are only quering for one record with the id that we received.
    $result = mysqli_query($conn, $sql);

    $pizza = mysqli_fetch_assoc($result);

    # once the query is successfull, free the result and close the connection.
    mysqli_free_result($result);
    mysqli_close($conn);

    // echo '<pre>';
    // print_r($pizza);
    // echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container center grey-text">
    <?php if ($pizza) : ?>
        <div class="card z-depth-0">
            <div class="col s12 md6">
                <div class="card-title">
                    <h4><?= htmlspecialchars($pizza['title']) ?></h4>
                </div>
                <div class="card-content">
                    <p>Created By: <?= htmlspecialchars($pizza['email']) ?></p>
                    <p><?= date($pizza['created_at']) ?></p>
    
                    <h4>Ingredients: </h4>
                    <p><?= htmlspecialchars($pizza['ingredients']) ?></p>
                </div>
                <div class="card-action"> 
                    <!-- Delete pizza if exist -->
                    <form action="details.php" method="POST">
                        <input type="hidden" name="id_to_delete" value="<?= $pizza['id'] ?>">
                        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                    </form>
                </div>
            </div>
        </div>
    <?php else : ?>
        <h5>No such pizza exist</h5>
    <?php endif; ?>
</div>
<?php include('templates/footer.php'); ?>
</body>

</html>