<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "send".
 *
 * @property integer $send_id
 * @property string $send_file
 * @property string $send_comment
 * @property integer $user_id
 * @property integer $e_id
 * @property integer $c_id
 * @property integer $st_id
 * @property integer $s_id
 *
 * @property Course $c
 * @property Status $st
 * @property Subject $s
 * @property User $user
 * @property Status $status
 */
class Send extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'send';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['send_id'], 'required'],
            [['send_id', 'user_id', 'e_id', 'c_id', 'st_id', 's_id'], 'integer'],
            [['send_comment'], 'string'],
            [['send_file'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'send_id' => 'Send ID',
            'send_file' => 'Send File',
            'send_comment' => 'Send Comment',
            'user_id' => 'User ID',
            'e_id' => 'E ID',
            'c_id' => 'C ID',
            'st_id' => 'St ID',
            's_id' => 'S ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Course::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSt()
    {
        return $this->hasOne(Status::className(), ['st_id' => 'st_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasOne(Subject::className(), ['s_id' => 's_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['st_id' => 'send_id']);
    }
}
