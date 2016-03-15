<?php

namespace backend\controllers;

use app\models\Course;
use Yii;
use app\models\Exam;
use app\models\ExamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExamController implements the CRUD actions for Exam model.
 */
class ExamController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Exam models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exam model.
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
     * Creates a new Exam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Exam();

        if ($model->load(Yii::$app->request->post()) ) {
            $c_title   = $model->coursename;
            $course    = Course::find()->where(['like', 'c_title', $c_title])->one();
            if (empty($course)) {
                Yii::$app->getSession()->setFlash('alert',[
                    'body'=>'ชื่อบทเรียนไม่ถูกต้องกรุณาตรวจสอบชื่อบทเรียนของท่าน',
                    'options'=>['class'=>'alert-warning']
                ]);
                return $this->render('create', [
                    'model' => $model,
                ]);
            } else {
                $model->c_id = $course->c_id;
            }
             $model->save(false);
            return $this->redirect(['view', 'id' => $model->e_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Exam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelCourse       = Course::findOne(['c_id' => $model->c_id]);
        $model->coursename = $modelCourse->c_title;

        if ($model->load(Yii::$app->request->post())) {
            $c_title   = $model->coursename;
            $course    = Course::find()->where(['like', 'c_title', $c_title])->one();
            if (empty($course)) {
                Yii::$app->getSession()->setFlash('alert',[
                    'body'=>'ชื่อบทเรียนไม่ถูกต้องกรุณาตรวจสอบชื่อบทเรียนของท่าน',
                    'options'=>['class'=>'alert-warning']
                ]);
                return $this->render('create', [
                    'model' => $model,
                ]);
            } else {
                $model->c_id = $course->c_id;
            }
             $model->save();
            return $this->redirect(['view', 'id' => $model->e_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Exam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Exam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exam::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
