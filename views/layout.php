<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Your Website</title>
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php if (isset($_SESSION['user']) && !is_null($_SESSION['user']) ) : ?>
        <div class="top-menu">
            <p>
                Hello <?= $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . '(role_id:' . $_SESSION['user']['role_id'] . ')' ?>
            </p>
            <p class="float-right">
                <a href="/user/logout">Logout</a>
            </p>
        </div>
    <?php endif; ?>
        <div class="container">
        <?php
            if (file_exists( $router->viewPath() )) {
                include $router->viewPath();
            }
        ?>
        </div>
</body>

</html>