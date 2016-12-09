<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stud_answer".
 *
 * @property integer $user_id
 * @property integer $choice_id
 * @property integer $choice_question_id
 *
 * @property Result[] $results
 * @property Choice $choice
 * @property User $user
 */
class StudAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stud_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'choice_id', 'choice_question_id'], 'required'],
            [['user_id', 'choice_id', 'choice_question_id'], 'integer'],
            [['choice_id', 'choice_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Choice::className(), 'targetAttribute' => ['choice_id' => 'id', 'choice_question_id' => 'question_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'choice_id' => 'Choice ID',
            'choice_question_id' => 'Choice Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['stud_answer_user_id' => 'user_id', 'stud_answer_choice_id' => 'choice_id', 'stud_answer_choice_question_id' => 'choice_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChoice()
    {
        return $this->hasOne(Choice::className(), ['id' => 'choice_id', 'question_id' => 'choice_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
