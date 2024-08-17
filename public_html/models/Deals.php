<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deals".
 *
 * @property int $id
 * @property string $name
 * @property float $amount
 *
 * @property Contacts[] $contacts
 */
class Deals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'amount'], 'required'],
            [['amount'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'amount' => 'Сумма',
        ];
    }

    /**
     * Gets query for [[Contacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::class, ['deal_id' => 'id']);
    }
    public function getContact()
    {
        return $this->hasOne(Contacts::class, ['deal_id' => 'id']);
    }
}
