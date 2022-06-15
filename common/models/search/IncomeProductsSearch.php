<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\IncomeProducts;

/**
 * IncomeProductsSearch represents the model behind the search form of `common\models\IncomeProducts`.
 */
class IncomeProductsSearch extends IncomeProducts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'income_id', 'product_id'], 'integer'],
            [['serial', 'exp_date', 'count', 'box', 'price', 'amout'], 'safe'],
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
        $query = IncomeProducts::find();

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
            'income_id' => $this->income_id,
            'product_id' => $this->product_id,
            'exp_date' => $this->exp_date,
        ]);

        $query->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'count', $this->count])
            ->andFilterWhere(['like', 'box', $this->box])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'amout', $this->amout]);

        return $dataProvider;
    }
}
