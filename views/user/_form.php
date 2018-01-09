<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?php if (!$model->isNewRecord) { ?>
    <div class="form-group addresses-list">
        <div class="row">
            <div class="col-md-6">Address</div>
            <div class="col-md-5">Comment</div>
            <div class="col-md-1"><a href="#" class="j_add-row btn">Добавить</a> </div>
        </div>
        <?php
        foreach ($model->addresses as $address) {
        ?>
        <div class="row">
            <div class="col-md-6">
                <?= Html::activeHiddenInput($address, 'id', ['name'=>'Addresses[id][]']) ?>
                <?= $form->field($address, 'address')->textarea(['name'=>'Addresses[address][]'])->label(false) ?></div>
            <div class="col-md-5"><?= $form->field($address, 'comment')->textarea(['name'=>'Addresses[comment][]'])->label(false) ?></div>
            <div class="col-md-1"><a href="#" class="j_delete-row btn">Удалить</a></div>
        </div>
        <?php
        }
        ?>
    </div>
    <?php } ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.j_delete-row', function () {
                $(this).closest('div.row').remove();
            });

            $('.j_add-row').on('click', function () {
                $addressList = $(this).closest('.addresses-list');
                $addressList.append('<div class="row">'+
                    '<div class="col-md-6">'+
                    '<input type="hidden" id="addresses-id" name="Addresses[id][]">'+
                    '<div class="form-group field-addresses-address required has-success">'+
                    '<textarea id="addresses-address" class="form-control" name="Addresses[address][]" aria-required="true" aria-invalid="false"></textarea>'+
                    '<div class="help-block"></div>'+
                    '</div></div>'+
                    '<div class="col-md-5"><div class="form-group field-addresses-comment">'+
                    '<textarea id="addresses-comment" class="form-control" name="Addresses[comment][]"></textarea>'+
                    '<div class="help-block"></div>'+
                    '</div></div>'+
                    '<div class="col-md-1"><a href="#" class="j_delete-row btn">Удалить</a></div>'+
                    '</div>');
            });
        });
    </script>
</div>
