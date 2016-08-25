<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmployeeCreatesCourse;

/**
 * EmployeeCreatesCourseSearch represents the model behind the search form about `common\models\EmployeeCreatesCourse`.
 */
class EmployeeCreatesCourseSearch extends EmployeeCreatesCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'course_id'], 'integer'],
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
        $query = EmployeeCreatesCourse::find();

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
            'employee_id' => $this->employee_id,
            'course_id' => $this->course_id,
        ]);

        return $dataProvider;
    }
}
