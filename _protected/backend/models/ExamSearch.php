<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exam;

/**
 * ExamSearch represents the model behind the search form about `app\models\Exam`.
 */
class ExamSearch extends Exam
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['e_id', 'e_score', 'c_id'], 'integer'],
            [['e_question', 'e_choice01', 'e_choice02', 'e_choice03', 'e_choice04', 'e_choice05', 'e_solve'], 'safe'],
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
        $query = Exam::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'e_id' => $this->e_id,
            'e_score' => $this->e_score,
            'c_id' => $this->c_id,
        ]);

        $query->andFilterWhere(['like', 'e_question', $this->e_question])
            ->andFilterWhere(['like', 'e_choice01', $this->e_choice01])
            ->andFilterWhere(['like', 'e_choice02', $this->e_choice02])
            ->andFilterWhere(['like', 'e_choice03', $this->e_choice03])
            ->andFilterWhere(['like', 'e_choice04', $this->e_choice04])
            ->andFilterWhere(['like', 'e_choice05', $this->e_choice05])
            ->andFilterWhere(['like', 'e_solve', $this->e_solve]);

        return $dataProvider;
    }
}
