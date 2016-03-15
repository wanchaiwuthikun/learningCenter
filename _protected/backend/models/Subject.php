<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "subject".
 *
 * @property integer $s_id
 * @property string $s_title
 * @property string $s_outcomes
 * @property string $s_standard
 * @property string $s_behavior
 * @property string $s_knowledge
 * @property string $s_learn
 * @property string $s_evaluate
 * @property string $s_activities
 * @property string $s_pdf
 * @property string $s_video
 * @property string $s_ppt
 * @property integer $c_id
 * @property string $s_worksheet
 *
 * @property Course $course
 * @property Send[] $sends
 * @property Course $c
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $coursename;

    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_id', 's_title','c_id','coursename'], 'required'],
            [['s_id', 'c_id'], 'integer'],
            [['s_title'], 'string', 'max' => 1000],
            [['s_video',  'coursename'], 'string', 'max' => 250],
            [['s_file'],'file', 'skipOnEmpty' =>  true ,'extensions' => 'pdf, ppt, docs, doc', 'maxFiles'=> 5],
            [['s_worksheet'], 'file', 'skipOnEmpty' => true , 'extensions' => 'pdf,docs,doc', 'maxFiles' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_id'        => 'S ID',
            's_title'     => 'ชื่อเนื้อหา',
            's_video'     => 'วิดีโอ',
            's_file'      => 'ไฟล์เนื้อหา',
            'c_id'        => 'ชื่อคอร์ส',
            's_worksheet' => 'ใบงาน',
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
    public function getSends()
    {
        return $this->hasMany(Send::className(), ['s_id' => 's_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Course::className(), ['c_id' => 'c_id']);
    }

    public function getUploadPath()
    {

        return   realpath(Yii::$app->basePath.'/../..').'/uploads/files';
    }
    public function getUploadUrl()
    {
        return Yii::getAlias('@uploadFiles');
    }

    public function uploadFile($model, $tempFile = null){
        $filesname = [];
        $json      = '';
        $path = $this->getUploadPath();
        $filesUpload = UploadedFile::getInstances($model,'s_file');
        if($filesUpload!==null){
            foreach ($filesUpload as $file) {
                try {
                    $files = $file->baseName .'.' . $file->extension;
                    if ($file->saveAs($path .'/'. $files)) {
                        $filesname[] = $files;
                    }
                } catch (Exception $e) {


                }
            }

            $fileJson = Json::encode($filesname);

        }
        return $fileJson;
    }
    public function uploadWorksheet($model, $tempFile = null)
    {
        $file = [];
        $json = '';
        try {
            $path = $this->getUploadPath();
            $worksheet = UploadedFile::getInstance($model, 's_worksheet');

            if ( $worksheet !== null) {

                $fileName = $worksheet->baseName.'.'.$worksheet->extension;

                if ($worksheet->saveAs($path.'/'.$fileName)) {
                    $filesName = Json::encode($fileName);

                }

            } else {

                $filesName = $tempFile;

            }

        } catch (Exception $e) {
            $filesName = $tempFile;
        }

        return $filesName;

    }

    public function initialPreview($data,$field,$type ='file'){
        $initial = [];
        $files = Json::decode($data);
        if(is_array($files)){
            foreach ($files as $key => $value) {
                if($type=='file'){
                    $initial[] = "<div class='file-preview-image'><i class='fa fa-file fa-5x' style='padding: 50px'></i></div>";
                }elseif($type=='config'){
                    $initial[] = [
                        'caption'=> $value,
                        'width'  => '120px',
                        'url'    => Url::to(['/subject/deletefile','id'=>$this->s_id,'fileName'=> $key, 'field' => $field]),
                        'key'    => $key
                    ];
                }
                else{
                    $initial[] = Html::img(Url::to('/uploads/photos').'/'.$value,['class'=>'file-preview-image']);
                }
            }
        }
        return $initial;
    }

    public function listDownloadFiles($type){
        $docs_file = '';
        if(in_array($type, ['s_file', 's_worksheet'])){
            $data = $type==='s_file'? $this->s_file : $this->s_worksheet;
            $files = Json::decode($data);
            if(is_array($files)){
                $docs_file ='<ul>';
                foreach ($files as $key => $value) {
                    $docs_file .= '<li>'.Html::a($value,['/subject/download','file_name'=>$value]).'</li>';
                }
                $docs_file .='</ul>';
            }
        }

        return $docs_file;
    }

    public function listDownloadWorksheet($type){
        $docs_file = '';
        $data = $this->s_worksheet;
        if (!empty($data))  {
            $files = Json::decode($data);
            $docs_file ='<ul>';

            $docs_file .= '<li>'.Html::a($data,['/subject/download','file_name'=>$files]).'</li>';

            $docs_file .='</ul>';
        }

        return $docs_file;
    }


}
