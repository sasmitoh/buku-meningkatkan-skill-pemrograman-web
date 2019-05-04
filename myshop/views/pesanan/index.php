<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pesanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            // 'id_produk',
            'id_pesanan',
            'produk.nama_produk',
            'jumlah',
            'harga_jual',
            'jumlah_bayar',
            'nama_pemesan',
            'alamat_pemesanan:ntext',
            'no_hp',
            [
                'attribute'=>'status_bayar',
                'value'=>function($model){
                    return $model->status_bayar==1 ? 'Lunas':'Belum Bayar';
                }
            ],
            // 'status_bayar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
