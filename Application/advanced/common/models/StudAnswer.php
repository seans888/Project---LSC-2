<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stud_answer".
 *
 * @property integer $choice_id
 * @property integer $choice_question_id
 * @property integer $student_id
 *
 * @property Result[] $results
 * @property Choice $choice
 * @property Student $student
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
            [['choice_id', 'choice_question_id', 'student_id'], 'required'],
            [['choice_id', 'choice_question_id', 'student_id'], 'integer'],
            [['choice_id', 'choice_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Choice::className(), 'targetAttribute' => ['choice_id' => 'id', 'choice_question_id' => 'question_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'choice_id' => 'Choice ID',
            'choice_question_id' => 'Choice Question ID',
            'student_id' => 'Student ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['stud_answer_choice_id' => 'choice_id', 'stud_answer_choice_question_id' => 'choice_question_id', 'stud_answer_student_id' => 'student_id']);
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
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
