<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Aplikasi My Shop';
?>
<div class="site-index">
    <?= Html::img('@web/image/header.jpg',['width'=>'100%', 'height'=>200])?>

<div class='body-content'>
    <div class='row'>
        <div align='center'>
        <?php foreach ($dataProduk as $produk) {
        ?>
            <div class='col-lg-4'>
                <h2><?= $produk->nama_produk ?></h2>
                <?= Html::img(Url::base().'/'.$produk->gambar_produk,['width'=>'200px'])?>
                <p><?= $produk->deskripsi ?></p>
                <p>
                    <?= Html::a('Detai',['produk/view','id'=>$produk->id_produk],['class'=>'btn btn-info'])?>
                    <?= Html::a('Beli',['produk/pesan','id'=>$produk->id_produk],['class'=>'btn btn-primary'])?>
                </p>
            </div>

        <?php }?>    
        </div>
    </div>

</div>
</div>
