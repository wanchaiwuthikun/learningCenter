<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course;

/**
 * CourseSearch represents the model behind the search form about `app\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id'], 'integer'],
            [['c_title', 'c_object', 'c_learn', 'c_expect'], 'safe'],
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
        $query = Course::find();

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
            'c_id' => $this->c_id,
        ]);

        $query->andFilterWhere(['like', 'c_title', $this->c_title])
            ->andFilterWhere(['like', 'c_object', $this->c_object])
            ->andFilterWhere(['like', 'c_learn', $this->c_learn])
            ->andFilterWhere(['like', 'c_expect', $this->c_expect]);

        return $dataProvider;
    }
}
