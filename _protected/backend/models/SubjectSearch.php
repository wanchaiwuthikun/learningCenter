<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subject;

/**
 * SubjectSearch represents the model behind the search form about `app\models\Subject`.
 */
class SubjectSearch extends Subject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_id', 'c_id'], 'integer'],
            [['s_title','s_file', 's_video', 's_worksheet'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Subject::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'count' => function($model) {
                return Subject::find()->groupBy($model->c_id)->count();
            }
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            's_id' => $this->s_id,
            'c_id' => $this->c_id,
        ]);

        $query->andFilterWhere(['like', 's_title', $this->s_title])
            ->andFilterWhere(['like', 's_file', $this->s_file])
            ->andFilterWhere(['like', 's_video', $this->s_video])
            ->andFilterWhere(['like', 's_worksheet', $this->s_worksheet]);

        return $dataProvider;
    }
}
