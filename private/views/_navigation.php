<ul>
    <li>
        <a href="<?php echo url('home') ?>" <?php if (current_route_is('home')) : ?> class="active" <?php endif ?>>Home</a>
    </li>
    <li>
        <a href="<?php echo url('video.page') ?>" <?php if (current_route_is('video.page')) : ?> class="active" <?php endif ?>>Video's</a>
    </li>
</ul>

<div class="user-menu">
    <?php
    if (isLoggedIn()) :
        echo getLoggedInUserEmail();
    endif;
    ?>
    <ul>
        <?php if (isLoggedIn()) : ?>
            <li>
                <a href="<?php echo url('daily.challenges') ?>" <?php if (current_route_is('daily.challenges')) : ?> class="active" <?php endif ?>>Daily challenges</a>
            </li>
            <li>
                <a href="<?php echo url('logout') ?>">Logout</a>
            </li>
        <?php else : ?>
            <li>
                <a href="<?php echo url('register.form') ?>" <?php if (current_route_is('register.form')) : ?> class="active" <?php endif ?>>Registreren</a>
            </li>
            <li>
                <a href="<?php echo url('login.form') ?>" <?php if (current_route_is('login.form')) : ?> class="active" <?php endif ?>>Login</a>
            </li>
        <?php endif; ?>
    </ul>
</div>