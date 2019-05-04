<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesanan".
 *
 * @property string $id_pesanan
 * @property int $id_produk
 * @property int $jumlah
 * @property double $harga_jual
 * @property double $jumlah_bayar
 * @property string $nama_pemesan
 * @property string $alamat_pemesanan
 * @property string $no_hp
 * @property int $status_bayar
 *
 * @property Produk $produk
 */
class Pesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan', 'id_produk', 'jumlah', 'harga_jual', 'jumlah_bayar', 'nama_pemesan', 'alamat_pemesanan', 'no_hp'], 'required'],
            [['id_produk', 'jumlah'], 'integer'],
            [['harga_jual', 'jumlah_bayar'], 'number'],
            [['alamat_pemesanan'], 'string'],
            [['id_pesanan'], 'string', 'max' => 20],
            [['nama_pemesan'], 'string', 'max' => 50],
            [['no_hp'], 'string', 'max' => 15],
            [['status_bayar'], 'string', 'max' => 4],
            [['id_pesanan'], 'unique'],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pesanan' => 'Id Pesanan',
            'id_produk' => 'Id Produk',
            'jumlah' => 'Jumlah',
            'harga_jual' => 'Harga Jual',
            'jumlah_bayar' => 'Jumlah Bayar',
            'nama_pemesan' => 'Nama Pemesan',
            'alamat_pemesanan' => 'Alamat Pemesanan',
            'no_hp' => 'No Hp',
            'status_bayar' => 'Status Bayar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'id_produk']);
    }
}
