<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pesanan') ?>

    <?= $form->field($model, 'id_produk') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'harga_jual') ?>

    <?= $form->field($model, 'jumlah_bayar') ?>

    <?php // echo $form->field($model, 'nama_pemesan') ?>

    <?php // echo $form->field($model, 'alamat_pemesanan') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'status_bayar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
