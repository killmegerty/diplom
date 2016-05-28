<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Your Website</title>
	<link href="/css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php if (isset($_SESSION['user']) && !is_null($_SESSION['user']) ) : ?>
        <p>
            Hello <?= $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] ?>
        </p>
    <?php endif; ?>
    <?php
        if (file_exists( $router->viewPath() )) {
            include $router->viewPath();
        }
    ?>	
</body>

</html>