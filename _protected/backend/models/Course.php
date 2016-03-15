<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $c_id
 * @property string $c_title
 * @property string $c_object
 * @property string $c_learn
 * @property string $c_expect
 *
 * @property Exam $c
 * @property Subject $c0
 * @property Exam[] $exams
 * @property Send[] $sends
 * @property Store[] $stores
 * @property Subject[] $subjects
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_title'], 'required'],
            [['c_object', 'c_learn', 'c_expect'], 'string'],
            [['c_title'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'จำนวนเนื้อหา',
            'c_title' => 'ชื่อคอร์สเรียน',
            'c_object' => 'วัตถุประสงค์',
            'c_learn' => 'วิธีการเรียนรู้',
            'c_expect' => 'ผลที่คาดว่าจะได้ที่รับ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Exam::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC0()
    {
        return $this->hasOne(Subject::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExams()
    {
        return $this->hasMany(Exam::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSends()
    {
        return $this->hasMany(Send::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['c_id' => 'c_id']);
    }
    public function Countsubject($value) {

        $result = Subject::find()->where(['c_id' => $value])->count();

        return $result;
    }
}
