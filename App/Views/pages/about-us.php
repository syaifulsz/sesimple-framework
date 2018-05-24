<?php

use App\Components\Helpers\View;
use App\Components\Config;

$title = 'About Sesimple Framework';

?>

<?= View::render('common/header', [
    'header' => [
        'title' => $title
    ],
    'no_index' => true
], true) ?>

<div class="container">
    <h1><?= $title ?></h1>
    <p>Well, its just a simple object oriented PHP framework to help you built something as fast as possible with very minimal feature.</p>
</div>

<?= View::render('common/footer', [], true) ?>
