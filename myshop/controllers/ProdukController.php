<?php

namespace app\controllers;

use Yii;
use app\models\Pesanan;
use app\models\Produk;
use app\models\Kategori;
use app\models\ProdukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * ProdukController implements the CRUD actions for Produk model.
 */
class ProdukController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Produk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produk model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Produk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Produk();

        if ($model->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'image');
            if($model->validate()){

                if(!empty($gambar)){
                        
                    $model->image= $gambar;
                    $nama_file = date('Ymdhis').'.'.$model->image->extension;
                    $lokasi_simpan ='image/produk';
                    FileHelper::createDirectory($lokasi_simpan);
                    $model->image->saveAs($lokasi_simpan.'/'.$nama_file);
                    $model->gambar_produk = $lokasi_simpan.'/'.$nama_file ;
                    
                }

                $model->save(false);
                return $this->redirect(['index']);

            }

            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Produk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'image');
            if($model->validate()){

                if(!empty($gambar)){
                        
                    $model->image= $gambar;
                    $nama_file = date('Ymdhis').'.'.$model->image->extension;
                    $lokasi_simpan ='image/produk';
                    FileHelper::createDirectory($lokasi_simpan);
                    $model->image->saveAs($lokasi_simpan.'/'.$nama_file);
                    $model->gambar_produk = $lokasi_simpan.'/'.$nama_file ;
                    
                }

                $model->save(false);
                return $this->redirect(['index']);

            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionPesan($id)
    {
        $produk = $this->findModel($id);
        $model = new Pesanan();
        $model->id_pesanan = date('Ymdhis');
        $model->id_produk = $id;
        $model->jumlah = 1;
        $model->harga_jual = $produk->harga_jual;
        $model->jumlah_bayar = $model->jumlah * $model->harga_jual;

        if ($model->load(Yii::$app->request->post())) {
           if($model->validate()){
             $model->save(false);
             return $this->redirect(['view-pesanan','id'=>$model->id_pesanan]);
           } 
        }

        return $this->render('_form_pesanan', [
            'model' => $model,
            'produk' => $produk,
        ]);
    }

    public function actionViewPesanan($id)
    {
        $model = Pesanan::findOne($id);
        return $this->render('_view_pesanan', [
            'model' => $model
        ]);
    }


    /**
     * Deletes an existing Produk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Produk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
