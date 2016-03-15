<?php

namespace backend\controllers;

use app\models\Course;
use app\models\CourseSearch;
use Yii;
use app\models\Subject;
use app\models\SubjectSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * SubjectController implements the CRUD actions for Subject model.
 */
class SubjectController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'deletefile' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Subject models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndex2($id)
    {
        $course_id    = $id;
        $searchModel  = new SubjectSearch();
        $q            = Subject::find()->where(['c_id' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $q,
        ]);


        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'c_id'        => $course_id,
        ]);
    }

    /**
     * Displays a single Subject model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Subject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model        = new Subject();
        $title        = Course::find()->where(['c_id' => $id])->one();
        $model->coursename = $title->c_title;

        if ($model->load(Yii::$app->request->post()) ) {

            $c_title   = $model->coursename;
            $course    = Course::find()->where(['like', 'c_title', $c_title])->one();


            if (empty($course)) {
                Yii::$app->getSession()->setFlash('alert',[
                    'body'=>'ชื่อบทเรียนไม่ถูกต้องกรุณาตรวจสอบชื่อบทเรียนของท่าน',
                    'options'=>['class'=>'alert-warning']
                ]);
                return $this->refresh();
            } else {
                $model->c_id = $course->c_id;
                $filesnew  = UploadedFile::getInstances($model, 's_file');
                $worksheet = UploadedFile::getInstance($model, 's_worksheet');
            }
            if (!empty($worksheet)) {

                $model->s_worksheet = $model->uploadWorksheet($model, 's_worksheet');

            } else {

                $model->s_worksheet = null;
            }if (!empty($filesnew)) {

                $model->s_file = $model->uploadFile($model, 's_file');
            }  else {

                $model->s_file = null;
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->s_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Subject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model             = $this->findModel($id);
        $modelCourse       = Course::findOne(['c_id' => $model->c_id]);
        $model->coursename = $modelCourse->c_title;
        $oldsheet          = $model->s_worksheet;
        if (!empty($oldsheet)) {
            $oldworksheet      = Json::decode($oldsheet);
        }
        if ($model->load(Yii::$app->request->post())) {
            $c_title   = $model->coursename;
            $course    = Course::find()->where(['like', 'c_title', $c_title])->one();
            $subject   = Subject::find()->where(['s_id' => $id])->one();
            $oldfile   = $subject->s_file;

            $filesnew  = UploadedFile::getInstances($model, 's_file');
            $worksheet = UploadedFile::getInstance($model, 's_worksheet');

            if (empty($course)) {

                Yii::$app->getSession()->setFlash('alert', [

                    'body'    =>'ชื่อบทเรียนไม่ถูกต้องกรุณาตรวจสอบชื่อบทเรียนของท่าน',
                    'options' =>['class'=>'alert-warning'
                    ]
                ]);
                return $this->refresh();

            } else {
                $model->c_id = $course->c_id;
            }

            if (!empty($worksheet) && !empty($oldworksheet)) {
                $path              = realpath(Yii::$app->basePath.'/../..').'/uploads/files';
                $worksheetname     = $path.'/'.$oldworksheet;
                @unlink($worksheetname);
                $model->s_worksheet = $model->uploadWorksheet($model, 's_worksheet');

            } elseif (!empty($worksheet) && empty($oldworksheet)) {
                $model->s_worksheet = $model->uploadWorksheet($model, 's_worksheet');
            } else {
                $model->s_worksheet = $oldsheet;
            }

            if (!empty($filesnew) && empty($oldfile)) {
                $newfiles      = $model->uploadFile($model,'s_file');
                $model->s_file = Json::encode($merch);
            } elseif (!empty($filesnew) && !empty($oldfile)) {
                $filesarray = Json::decode($oldfile);
                if (is_array($filesarray)) {
                    $newfiles      = $model->uploadFile($model,'s_file');
                    $newfilesArray = Json::decode($newfiles);
                    if(is_array($newfilesArray)){
                        $mearch        = ArrayHelper::mearch($filesarray,$newfilesArray);
                        $model->s_file = Json::encode($mearch);
                    }
                }
            } else {
                $model->s_file  =    $oldfile  ;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->s_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Subject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Subject::find()->where(['s_id' => $id])->one();
        $worksheet = $model->s_worksheet;
        $file = $model->s_file;
        $path = realpath(Yii::$app->basePath . '/../..') . '/uploads/files';
        if (!empty($worksheet)) {
            $worksheetfile = $path . '/' . $worksheet;
            @unlink($worksheetfile);
        }
        if (!empty($file)) {

            $filearray = Json::encode($file);
            if (is_array($filearray)) {
                foreach ($filearray as $f) {
                    $filename = $path . '/' . $f;
                    @unlink($filename);
                }
            }

        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionDeletefile($id, $fileName)
    {
        $model = Subject::find()->where(['s_id' => $id])->one();
        $path  = realpath(Yii::$app->basePath.'/../..').'/uploads/files';
        if($model!==NULL){

            if($model->s_file){
                $m = Json::decode($model->s_file);
                $t = array_splice($m, $fileName, 1);
                foreach ($m as $key => $f) {
                    $filename  = $path.'/'.$f;
                    if ($key == $fileName){
                        @unlink($filename);
                    }

                }
                $model->s_file = Json::encode($t);
                $model->save();

                echo json_encode(['success'=>true]);
            }else{
                echo json_encode(['success'=>false]);
            }
        }else{
            echo json_encode(['success'=>false]);
        }
    }

    public function actionDownload($file_name){

        $path = realpath(Yii::$app->basePath.'/../..').'/uploads/files';
        return  Yii::$app->response->sendFile($path.'/'.$file_name);

    }

    /**
     * Finds the Subject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
