<?php

namespace common\modules\user\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\user\models\User;

/**
 * UserSearch represents the model behind the search form about `common\modules\user\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'status', 'updated_at', 'number_of_hours'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status_student', 'review_class', 'first_name', 'middle_name', 'guardian_email_address', 'last_name', 'nickname', 'gender', 'age', 'contact_number', 'home_address', 'school', 'school_address', 'guardian_name', 'relation', 'guardian_contact_number', 'date_of_registration'], 'safe'],
            [['image'], 'safe', 'on' => 'update-image'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // bypass scenarios() implementation in the parent class
        $scenarios['update-image'] = ['image'];
        return $scenarios;
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
        $query = User::find();

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
            'status' => $this->status,
            'updated_at' => $this->updated_at,
            'number_of_hours' => $this->number_of_hours,
            'date_of_registration' => $this->date_of_registration,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status_student', $this->status_student])
            ->andFilterWhere(['like', 'review_class', $this->review_class])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'guardian_email_address', $this->guardian_email_address])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'home_address', $this->home_address])
            ->andFilterWhere(['like', 'school', $this->school])
            ->andFilterWhere(['like', 'school_address', $this->school_address])
            ->andFilterWhere(['like', 'guardian_name', $this->guardian_name])
            ->andFilterWhere(['like', 'relation', $this->relation])
            ->andFilterWhere(['like', 'guardian_contact_number', $this->guardian_contact_number])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
