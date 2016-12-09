<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "result".
 *
 * @property integer $id
 * @property string $feedback
 * @property integer $score
 * @property integer $grade
 * @property integer $min_grade
 * @property integer $max_grade
 * @property integer $stud_answer_user_id
 * @property integer $stud_answer_choice_id
 * @property integer $stud_answer_choice_question_id
 *
 * @property StudAnswer $studAnswerUser
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feedback', 'score', 'grade', 'stud_answer_user_id', 'stud_answer_choice_id', 'stud_answer_choice_question_id'], 'required'],
            [['score', 'grade', 'min_grade', 'max_grade', 'stud_answer_user_id', 'stud_answer_choice_id', 'stud_answer_choice_question_id'], 'integer'],
            [['feedback'], 'string', 'max' => 100],
            [['stud_answer_user_id', 'stud_answer_choice_id', 'stud_answer_choice_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudAnswer::className(), 'targetAttribute' => ['stud_answer_user_id' => 'user_id', 'stud_answer_choice_id' => 'choice_id', 'stud_answer_choice_question_id' => 'choice_question_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feedback' => 'Feedback',
            'score' => 'Score',
            'grade' => 'Grade',
            'min_grade' => 'Min Grade',
            'max_grade' => 'Max Grade',
            'stud_answer_user_id' => 'Stud Answer User ID',
            'stud_answer_choice_id' => 'Stud Answer Choice ID',
            'stud_answer_choice_question_id' => 'Stud Answer Choice Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudAnswerUser()
    {
        return $this->hasOne(StudAnswer::className(), ['user_id' => 'stud_answer_user_id', 'choice_id' => 'stud_answer_choice_id', 'choice_question_id' => 'stud_answer_choice_question_id']);
    }
}
