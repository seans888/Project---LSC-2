<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stud_answer".
 *
 * @property integer $id
 * @property string $user_answer
 * @property string $title
 * @property string $answer
 * @property string $answers
 * @property integer $question_id
 *
 * @property Result[] $results
 * @property Question $question
 */
class StudAnswer extends \yii\db\ActiveRecord
{
    public $id;
    public $question_id;
    public $user_answer;
    public $title;
    public $answer;
    public $answers;
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
            [['question_id'], 'required'],
            [['question_id'], 'integer'],
            [['user_answer', 'title', 'answer', 'answers'], 'string', 'max' => 255],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_answer' => 'User Answer',
            'title' => 'Title',
            'answer' => 'Answer',
            'answers' => 'Answers',
            'question_id' => 'Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['stud_answer_id' => 'id', 'stud_answer_question_id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
}
