<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudAnswer;

/**
 * StudAnswerSearch represents the model behind the search form about `common\models\StudAnswer`.
 */
class StudAnswerSearch extends StudAnswer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['choice_id', 'choice_question_id', 'student_id'], 'integer'],
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
        $query = StudAnswer::find();

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
            'choice_id' => $this->choice_id,
            'choice_question_id' => $this->choice_question_id,
            'student_id' => $this->student_id,
        ]);

        return $dataProvider;
    }
}
