<?php
use yii\widgets\ActiveForm;
use app\models\LinkForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var LinkForm $model */

$this->title = 'Links';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2>Добавьте короткую ссылку</h2>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'link'); ?>

                <?= Html::submitButton('submit', ['class'=>'btn btn-success']); ?>

                <?php $form = ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>
