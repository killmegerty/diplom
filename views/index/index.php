<?php if (!isset($_SESSION['user']) ) : ?>
    
    <form action="/user/login" method="post">
        <label for="login">Login</label>
        <input type="text" name="login">
        <label for="password">Password</label>
        <input type="password" name="password">
        <button type="submit">Log In</button>
    </form>
    
<?php endif; ?>

<?php var_dump($registry->get('users') ) ?>