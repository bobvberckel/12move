<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme color" content="#2AD190">
    <meta name="author" content="Mike Yang & Bob van Berckel">
    <title>12move | Login</title>
    <script src="https://kit.fontawesome.com/e8bbed1e5b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo site_url('/style/style.css') ?>" media="all">
    <?php if ($this->section('css')) : ?>
        <?php echo $this->section('css') ?>
    <?php endif; ?>
</head>

<body>
    <div class="container">
        <nav>
            <div class="left">
                <a href="<?php echo url('home') ?>" <?php if (current_route_is('home')) : ?> class="active" <?php endif ?>>
                    <img src="<?php echo site_url("/images/logo.png"); ?>" alt="Logo van 12move">
                </a>
            </div>
            <?php if ($this->section('navigation')) : ?>
                <?php echo $this->section('navigation') ?>
            <?php else : ?>
                <?php echo $this->fetch('_navigation') ?>
            <?php endif ?>

        </nav>
        <main>
            <section class="content">
                <?php echo $this->section('content') ?>
            </section>
            <aside>
                <?php echo $this->section('sidebar') ?>
            </aside>
        </main>
        <footer>
            &copy; All Rights Reserved <?php echo date("Y"); ?>

                <br>

            Made by Mike Yang & Bob van Berckel
        </footer>
    </div>
    <?php $this->start('javascript') ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <?php $this->stop(); ?>
</body>

</html>