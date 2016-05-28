<?php if (!isset($_SESSION['user']) ) : ?>
    <form action="/user/login" method="post">
        <label for="login">Login</label>
        <input type="text" name="login">
        <label for="password">Password</label>
        <input type="password" name="password">
        <button type="submit">Log In</button>
    </form>
    <hr>
<?php else : ?>
    <p>
        <a href="/index/tutorial">Пройти обучение</a>
    </p>
    <p>
        <a href="/index/test">Пройти контроль знаний</a>
    </p>
<?php endif; ?>

