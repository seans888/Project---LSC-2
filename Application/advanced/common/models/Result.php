<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "result".
 *
 * @property string $feedback
 * @property integer $min_grade
 * @property integer $max_grade
 * @property integer $stud_answer_choice_id
 * @property integer $stud_answer_choice_question_id
 * @property integer $stud_answer_student_id
 *
 * @property StudAnswer $studAnswerChoice
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
            [['feedback', 'stud_answer_choice_id', 'stud_answer_choice_question_id', 'stud_answer_student_id'], 'required'],
            [['min_grade', 'max_grade', 'stud_answer_choice_id', 'stud_answer_choice_question_id', 'stud_answer_student_id'], 'integer'],
            [['feedback'], 'string', 'max' => 45],
            [['stud_answer_choice_id', 'stud_answer_choice_question_id', 'stud_answer_student_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudAnswer::className(), 'targetAttribute' => ['stud_answer_choice_id' => 'choice_id', 'stud_answer_choice_question_id' => 'choice_question_id', 'stud_answer_student_id' => 'student_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'feedback' => 'Feedback',
            'min_grade' => 'Min Grade',
            'max_grade' => 'Max Grade',
            'stud_answer_choice_id' => 'Stud Answer Choice ID',
            'stud_answer_choice_question_id' => 'Stud Answer Choice Question ID',
            'stud_answer_student_id' => 'Stud Answer Student ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudAnswerChoice()
    {
        return $this->hasOne(StudAnswer::className(), ['choice_id' => 'stud_answer_choice_id', 'choice_question_id' => 'stud_answer_choice_question_id', 'student_id' => 'stud_answer_student_id']);
    }
}
