<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sale;

/**
 * SaleSearch represents the model behind the search form of `common\models\Sale`.
 */
class SaleSearch extends Sale
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_subject_id', 'total_price', 'paid', 'payed_id', 'operator_id', 'type_id', 'status_id', 'branch_id'], 'integer'],
            [['created', 'updated'], 'safe'],
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
        $query = Sale::find();

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
            'client_subject_id' => $this->client_subject_id,
            'created' => $this->created,
            'updated' => $this->updated,
            'total_price' => $this->total_price,
            'paid' => $this->paid,
            'payed_id' => $this->payed_id,
            'operator_id' => $this->operator_id,
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'branch_id' => $this->branch_id,
        ]);

        return $dataProvider;
    }
}
