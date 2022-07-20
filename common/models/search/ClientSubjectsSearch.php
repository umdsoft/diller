<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ClientSubjects;

/**
 * ClientSubjectsSearch represents the model behind the search form of `common\models\ClientSubjects`.
 */
class ClientSubjectsSearch extends ClientSubjects
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'district_id', 'type_id', 'group_id'], 'integer'],
            [['name', 'alt_name', 'address', 'lan', 'lng', 'phone', 'email', 'director', 'inn', 'oked', 'nds_number', 'referent_point', 'note', 'created_at', 'updated_at'], 'safe'],
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
        $query = ClientSubjects::find();

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
            'district_id' => $this->district_id,
            'type_id' => $this->type_id,
            'group_id' => $this->group_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alt_name', $this->alt_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'lan', $this->lan])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'oked', $this->oked])
            ->andFilterWhere(['like', 'nds_number', $this->nds_number])
            ->andFilterWhere(['like', 'referent_point', $this->referent_point])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
