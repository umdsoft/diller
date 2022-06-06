<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Branches;

/**
 * BranchesSearch represents the model behind the search form of `common\models\Branches`.
 */
class BranchesSearch extends Branches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'code', 'number', 'inn', 'phone'], 'integer'],
            [['branch_name', 'contracgen_name', 'leader', 'alternative_name', 'responsible', 'address', 'created_at', 'updated_at'], 'safe'],
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
        $query = Branches::find();

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
            'status' => $this->status,
            'code' => $this->code,
            'number' => $this->number,
            'inn' => $this->inn,
            'phone' => $this->phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'branch_name', $this->branch_name])
            ->andFilterWhere(['like', 'contracgen_name', $this->contracgen_name])
            ->andFilterWhere(['like', 'leader', $this->leader])
            ->andFilterWhere(['like', 'alternative_name', $this->alternative_name])
            ->andFilterWhere(['like', 'responsible', $this->responsible])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
