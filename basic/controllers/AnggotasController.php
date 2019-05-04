<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Anggota;

class AnggotasController extends Controller
{
    public function actionIndex() {
        $anggotas = Anggota::find()->all();
        

        return $this->render('index',['anggota'=>$anggotas]);
    }
}
