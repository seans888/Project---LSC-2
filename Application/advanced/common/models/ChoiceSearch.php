<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Task;

/**
 * ChoiceSearch represents the model behind the search form about `common\models\Task`.
 */
class ChoiceSearch extends Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'attempts', 'course_id'], 'integer'],
            [['title', 'description', 'task_type', 'date_created', 'time_open', 'time_close', 'date_open', 'date_close', 'time_remaining'], 'safe'],
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
        $query = Task::find();

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
            'date_created' => $this->date_created,
            'time_open' => $this->time_open,
            'time_close' => $this->time_close,
            'date_open' => $this->date_open,
            'date_close' => $this->date_close,
            'time_remaining' => $this->time_remaining,
            'attempts' => $this->attempts,
            'course_id' => $this->course_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'task_type', $this->task_type]);

        return $dataProvider;
    }
}
