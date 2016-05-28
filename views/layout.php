<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Your Website</title>
</head>

<body>
    <?php if (isset($_SESSION['user']) && !is_null($_SESSION['user']) ) : ?>
        <p>
            Hello <?= $_SESSION['user']['name'] ?>
        </p>
    <?php endif; ?>
    <?php
    	if (file_exists( $router->viewPath() )) {
            include $router->viewPath();
        }
    ?>	
</body>

</html>