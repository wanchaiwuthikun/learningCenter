<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Send;

/**
 * SendSearch represents the model behind the search form about `app\models\Send`.
 */
class SendSearch extends Send
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['send_id', 'user_id', 'e_id', 'c_id', 'st_id', 's_id'], 'integer'],
            [['send_file', 'send_comment'], 'safe'],
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
        $query = Send::find();

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
            'send_id' => $this->send_id,
            'user_id' => $this->user_id,
            'e_id' => $this->e_id,
            'c_id' => $this->c_id,
            'st_id' => $this->st_id,
            's_id' => $this->s_id,
        ]);

        $query->andFilterWhere(['like', 'send_file', $this->send_file])
            ->andFilterWhere(['like', 'send_comment', $this->send_comment]);

        return $dataProvider;
    }
}
