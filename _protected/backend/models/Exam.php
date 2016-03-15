<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exam".
 *
 * @property integer $e_id
 * @property string $e_question
 * @property string $e_choice01
 * @property string $e_choice02
 * @property string $e_choice03
 * @property string $e_choice04
 * @property string $e_choice05
 * @property integer $e_score
 * @property string $e_solve
 * @property integer $c_id
 *
 * @property Course $course
 * @property Course $c
 * @property Store[] $stores
 */
class Exam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $coursename;
    public static function tableName()
    {
        return 'exam';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['e_id', 'e_question', 'e_choice01', 'e_choice02', 'e_choice03', 'e_choice04', 'e_choice05', 'e_score', 'e_solve'], 'required'],
            [['e_id', 'e_score', 'c_id'], 'integer'],
            [['e_question', 'coursename'], 'string', 'max' => 1000],
            [['e_choice01', 'e_choice02', 'e_choice03', 'e_choice04', 'e_choice05', 'e_solve'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'e_id'       => 'รหัสข้อสอบ',
            'e_question'  => 'คำถาม',
            'e_choice01'  => 'คำตอบ(1)',
            'e_choice02'  => 'คำตอบ(2)',
            'e_choice03'  => 'คำตอบ(3)',
            'e_choice04'  => 'คำตอบ(4)',
            'e_choice05'  => 'คำตอบ(5)',
            'e_score'     => 'คะแนน',
            'e_solve'     => 'เฉลย',
            'c_id'        => 'C ID',
            'coursename'  => 'ชื่อบทเรียน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['c_id' => 'c_id']);
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
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['e_id' => 'e_id']);
    }
}
