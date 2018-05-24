<?php

use App\Components\Helpers\View;

?>

<?= View::render('common/header', $params, true) ?>

<div class="container">

    <div class="alert alert-success" role="alert">
        <h1 class="display-4">Sesimple Framework</h1>
        <?= implode(' ', $messages) ?>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
</div>

<?php ob_start(); ?>
    <script>
        $(function () {
            console.log('this is an example how to append script before <body> ends $add_in_foot');
        });
    </script>
<?php $add_in_foot = ob_get_contents(); ob_end_clean(); ?>

<?= View::render('common/footer', [], true) ?>
