<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Choice;

/**
 * ChoiceSearch represents the model behind the search form about `common\models\Choice`.
 */
class ChoiceSearch extends Choice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'question_id'], 'integer'],
            [['choose', 'is_correct'], 'safe'],
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
        $query = Choice::find();

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
            'question_id' => $this->question_id,
        ]);

        $query->andFilterWhere(['like', 'choose', $this->choose])
            ->andFilterWhere(['like', 'is_correct', $this->is_correct]);

        return $dataProvider;
    }
}
