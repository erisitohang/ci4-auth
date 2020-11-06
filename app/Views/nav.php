<ul class="navbar-nav ml-auto">
<?php if (session('isLoggedIn')) : ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('logout') ?>">Logout</a>
    </li>
<?php else : ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('login') ?>">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('register') ?>">Register</a>
    </li>
<?php endif; ?>
</ul>
