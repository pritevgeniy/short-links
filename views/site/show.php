<?php
use app\models\Link;

/** @var yii\web\View $this */
/** @var Link $model */

$this->title = 'Links';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Короткие ссылки</h1>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-primary" role="alert">
                    http://<?= ($_SERVER['SERVER_NAME'] ?? '') . '/' .  $model->short ?>
                </div>
            </div>
        </div>

    </div>
</div>
