<header class="website-header">
    <div class="container nav">
        <div class="T-level Resturant">
            <a href="example">T-level Resturant</a>
        </div>
        <nav class="menu">
            <a href="example">T-level Resturant</a>
            <?php if (is_loggedin()): ?>
            <a href="example1">Profile</a>
            <a href="example2">book</a>
            <?php else: ?>
            <a href="example3">Login</a>
            <a href="example4">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
