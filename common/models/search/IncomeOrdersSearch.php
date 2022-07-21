<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IncomeOrders;

/**
 * IncomeOrdersSearch represents the model behind the search form of `common\models\IncomeOrders`.
 */
class IncomeOrdersSearch extends IncomeOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number', 'status', 'branch_id'], 'integer'],
            [['created', 'updated', 'number_full'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = IncomeOrders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'created' => $this->created,
            'updated' => $this->updated,
            'number' => $this->number,
            'status' => $this->status,
            'branch_id' => $this->branch_id,
        ]);

        $query->andFilterWhere(['like', 'number_full', $this->number_full])
            ->andFilterWhere(['like', 'created', $this->created]);

        return $dataProvider;
    }
}
