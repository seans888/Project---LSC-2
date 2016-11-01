<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Result;

/**
 * ResultSearch represents the model behind the search form about `common\models\Result`.
 */
class ResultSearch extends Result
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feedback'], 'safe'],
            [['min_grade', 'max_grade', 'stud_answer_choice_id', 'stud_answer_choice_question_id', 'stud_answer_student_id'], 'integer'],
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
        $query = Result::find();

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
            'min_grade' => $this->min_grade,
            'max_grade' => $this->max_grade,
            'stud_answer_choice_id' => $this->stud_answer_choice_id,
            'stud_answer_choice_question_id' => $this->stud_answer_choice_question_id,
            'stud_answer_student_id' => $this->stud_answer_student_id,
        ]);

        $query->andFilterWhere(['like', 'feedback', $this->feedback]);

        return $dataProvider;
    }
}
