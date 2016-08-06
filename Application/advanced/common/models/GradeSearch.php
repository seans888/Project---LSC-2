<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Grade;

/**
 * GradeSearch represents the model behind the search form about `common\models\Grade`.
 */
class GradeSearch extends Grade
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'homework', 'exercise', 'quiz', 'grade_final', 'student_id', 'course_id'], 'integer'],
            [['date', 'subject', 'attendance'], 'safe'],
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
        $query = Grade::find();

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
            'date' => $this->date,
            'homework' => $this->homework,
            'exercise' => $this->exercise,
            'quiz' => $this->quiz,
            'grade_final' => $this->grade_final,
            'student_id' => $this->student_id,
            'course_id' => $this->course_id,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'attendance', $this->attendance]);

        return $dataProvider;
    }
}
