<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $deal_id
 *
 * @property Deals $deal
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'deal_id'], 'required'],
            [['deal_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['deal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Deals::class, 'targetAttribute' => ['deal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'deal_id' => 'Deal ID',
        ];
    }

    /**
     * Gets query for [[Deal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeal()
    {
        return $this->hasOne(Deals::class, ['id' => 'deal_id']);
    }
    public function getDeals()
    {
        return $this->hasMany(Deals::class, ['id' => 'deal_id']);
    }
}
