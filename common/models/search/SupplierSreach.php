<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Suppliers;

/**
 * SupplierSreach represents the model behind the search form of `common\models\Suppliers`.
 */
class SupplierSreach extends Suppliers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'inn', 'oked', 'okonx', 'address', 'phone', 'director', 'buxgalter', 'phone_bux', 'nds_num', 'created_at', 'updated_at'], 'safe'],
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
        $query = Suppliers::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'oked', $this->oked])
            ->andFilterWhere(['like', 'okonx', $this->okonx])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'buxgalter', $this->buxgalter])
            ->andFilterWhere(['like', 'phone_bux', $this->phone_bux])
            ->andFilterWhere(['like', 'nds_num', $this->nds_num]);

        return $dataProvider;
    }
}
