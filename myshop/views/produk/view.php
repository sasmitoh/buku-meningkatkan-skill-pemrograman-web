<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = $model->nama_produk;
$this->params['breadcrumbs'][] = ['label' => 'Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="produk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id_produk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_produk], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->

        <?= Html::a('Pesan', ['pesan', 'id'=>$model->id_produk],['class' => 'btn btn-warning'])?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_produk',
            // 'category_id',
            'nama_produk',
            'deskripsi:ntext',
            'harga_jual',
            [
                'attribute'=>'gambar_produk',
                'format'=>'html',
                'value'=>Html::img(Url::base().'/'.$model->gambar_produk)
            ],
            // 'gambar_produk',
        ],
    ]) ?>

</div>
