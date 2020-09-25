<?php


include('config/db_connect.php');
//create a query
$sql = 'SELECT  title, ingredients, id FROM pizzas ORDER BY created_at';

// make a Query to db and get result
$result = mysqli_query($conn, $sql);

//fetch the resultintg rows as an array.
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Free the result from the memory
mysqli_free_result($result);

//close the connection
mysqli_close($conn);

// echo '<pre>';
// print_r($pizzas);
// echo '</pre>'
//print_r($pizzas);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>
<h4 class="center grey-text">Pizzas!</h4>

<div class="container grey-text">
    <div class="row">
        <?php foreach ($pizzas as $pizza) : ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="img/Chef-Pizza-Vector.jpg" alt="Pizza" class="pizza">
                    <div class="card-title center"><?= htmlspecialchars($pizza['title']); ?></div>
                    <div class="card-content center">
                        <h4>Ingredients</h4>
                        <div>
                            <ul>
                                <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                    <li><?= htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?= $pizza['id'] ?>" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include('templates/footer.php'); ?>
</body>

</html>