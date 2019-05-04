<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id_produk
 * @property int $category_id
 * @property string $nama_produk
 * @property string $deskripsi
 * @property double $harga_jual
 * @property string $gambar_produk
 *
 * @property Pesanan[] $pesanans
 * @property Kategori $category
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
    }


    /**
     * {@inheritdoc}
     */

    public $image;

    public function rules()
    {
        return [
            [['category_id', 'nama_produk', 'deskripsi', 'harga_jual'], 'required'],
            [['category_id'], 'integer'],
            [['deskripsi'], 'string'],
            [['harga_jual'], 'number'],
            [['nama_produk'], 'string', 'max' => 50],
            [['gambar_produk'], 'string', 'max' => 250],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['category_id' => 'id_category']],

            ['image', 'file', 'extensions' => ['jpg','png','JPEG','JPG','gif'], 
                'wrongExtension' => 'Hanya format gambar {extensions}  yang diizinkan untuk {attribute}.',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Produk',
            'category_id' => 'Nama Kategori',
            'nama_produk' => 'Nama Produk',
            'deskripsi' => 'Deskripsi',
            'harga_jual' => 'Harga Jual',
            'gambar_produk' => 'Gambar Produk',
            'image' => 'Upload Gambar Produk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanans()
    {
        return $this->hasMany(Pesanan::className(), ['id_produk' => 'id_produk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Kategori::className(), ['id_category' => 'category_id']);
    }
}
