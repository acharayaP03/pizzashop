<?php

    session_start();
    if($_SERVER['QUERY_STRING']  == 'noname'){
        session_unset();
    }
    $name = $_SESSION['name'];

?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>pizzashop</title>

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
        }

        html {
            box-sizing: inherit;
            font-size: 62.5%;
        }

        body {
            font-family: 'Nunito', sans-serif;
            font-size: 1.6rem;
            font-weight: 400;
            box-sizing: border-box;
        }

        .brand {
            background: #cbb09c !important;
        }

        .brand-text {
            color: #cbb09c !important;
        }

        label {
            font-size: 1.6rem;
        }

        form {
            width: max(350px, 60%);
            margin: 0 auto;
            padding: 2rem;
        }

        input[type="text"] {
            font-family: inherit;
            color: inherit;
            padding: 1rem;
        }

        input[type="text"]:not(:last-child) {
            margin-bottom: 1.5rem;
        }

        .pizza {
            width: 10rem;
            height: 10rem;
            margin: 4rem auto -3rem;
            display: block;
            position: relative;
            top: -3rem;
        }

        .card-title {
            padding: 1.5rem 2.5rem;
            text-transform: capitalize;
        }

        .card-content p+.card-content p {
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Awesome Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <?php if (isset($name)) : ?>
                    <li class="brand-text">Hello, <?= htmlspecialchars($name) ?></li>
                <?php else : ?>
                    <li><a href="session.php" class="brand-text">Enter Name</a></li>
                <?php endif; ?>
                <li><a href="add.php" class="btn brand z-depth-0">Add a pizza</a></li>
            </ul>
        </div>
    </nav>