<?php if (isset($_SESSION['user']) && !is_null($_SESSION['user']) ) : ?>
    <h3>This is tutorial page</h3>
<?php else : ?>
    <h3>This is tutorial page</h3>
    <p>
        Please log in first
    </p>
<?php endif; ?>
