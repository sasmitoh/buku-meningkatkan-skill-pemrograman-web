<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pesanan */

$this->title = $model->id_pesanan;
$this->params['breadcrumbs'][] = ['label' => 'Pesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tutup', ['site/index'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pesanan',
            'produk.nama_produk',
            'jumlah',
            'harga_jual',
            'jumlah_bayar',
            'nama_pemesan',
            'alamat_pemesanan:ntext',
            'no_hp',
            //'status_bayar',
        ],
    ]) ?>

    <p >Mohon segera lakukan pemayaran ke rekening berikut :</p>
    <p> 
        No Rekening : 333333333  <br>
        A.N : Ngoding Study CLub <br>
        Bank : BCA <br>
        Berita : <?= $model->id_pesanan ?>
    </p>

</div>
