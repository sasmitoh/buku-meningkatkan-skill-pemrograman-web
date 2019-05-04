<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Kategori;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <!-- <? // $form->field($model, 'category_id')->textInput() ?>  -->

    <?php 
        $QueryKategori = Kategori::find()->orderBy(['nama_category'=>SORT_ASC])->all();
        $dataKategori = ArrayHelper::map($QueryKategori, 'id_category', 'nama_category');

        echo $form->field($model, 'category_id')->dropDownList($dataKategori,[
            'prompt' => '---pilih kategori---'
        ])
    ?>

    <?= $form->field($model, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'harga_jual')->textInput() ?>

    <!-- <?= $form->field($model, 'gambar_produk')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'image')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
