<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $st_id
 * @property string $st_title
 *
 * @property Send[] $sends
 * @property Send $st
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_id'], 'required'],
            [['st_id'], 'integer'],
            [['st_title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'st_id' => 'St ID',
            'st_title' => 'สถานะส่งงาน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSends()
    {
        return $this->hasMany(Send::className(), ['st_id' => 'st_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSt()
    {
        return $this->hasOne(Send::className(), ['send_id' => 'st_id']);
    }
}
