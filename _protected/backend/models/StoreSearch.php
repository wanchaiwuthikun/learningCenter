<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Store;

/**
 * StoreSearch represents the model behind the search form about `app\models\Store`.
 */
class StoreSearch extends Store
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'store_pscore', 'store_postscore', 'e_id', 'user_id', 'c_id'], 'integer'],
            [['store_exam'], 'safe'],
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
        $query = Store::find();

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
            'store_id' => $this->store_id,
            'store_pscore' => $this->store_pscore,
            'store_postscore' => $this->store_postscore,
            'e_id' => $this->e_id,
            'user_id' => $this->user_id,
            'c_id' => $this->c_id,
        ]);

        $query->andFilterWhere(['like', 'store_exam', $this->store_exam]);

        return $dataProvider;
    }
}
