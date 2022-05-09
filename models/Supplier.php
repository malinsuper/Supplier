<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $t_status
 */
class Supplier extends \yii\db\ActiveRecord
{

    const T_STATUS_OK = 'ok';
    const T_STATUS_HOLD = 'hold';

    public static $tStatusList = [
        self::T_STATUS_OK => 'ok',
        self::T_STATUS_HOLD => 'hold',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'safe'],
            [['name', 'code', 't_status'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'NAME',
            'code' => 'CODE',
            't_status' => 'T-STATUS',
        ];
    }
}
