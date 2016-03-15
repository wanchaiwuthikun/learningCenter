<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property integer $store_id
 * @property string $store_exam
 * @property integer $store_pscore
 * @property integer $store_postscore
 * @property integer $e_id
 * @property integer $user_id
 * @property integer $c_id
 *
 * @property Course $c
 * @property User $user
 * @property Exam $e
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id'], 'required'],
            [['store_id', 'store_pscore', 'store_postscore', 'e_id', 'user_id', 'c_id'], 'integer'],
            [['store_exam'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store_id' => 'Store ID',
            'store_exam' => 'เก็บข้อสอบที่สุ่มมา',
            'store_pscore' => 'คะแนนสอบก่อนเรียน',
            'store_postscore' => 'คะแนนสอบหลังเรียน',
            'e_id' => 'E ID',
            'user_id' => 'User ID',
            'c_id' => 'C ID',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getE()
    {
        return $this->hasOne(Exam::className(), ['e_id' => 'e_id']);
    }
}
