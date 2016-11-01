<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "choice".
 *
 * @property integer $id
 * @property string $choose
 * @property string $is_correct
 * @property integer $question_id
 *
 * @property Question $question
 * @property StudAnswer[] $studAnswers
 * @property Student[] $students
 */
class Choice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'choice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['choose', 'is_correct', 'question_id'], 'required'],
            [['question_id'], 'integer'],
            [['choose', 'is_correct'], 'string', 'max' => 255],
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
            'choose' => 'Choose',
            'is_correct' => 'Is Correct',
            'question_id' => 'Question ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudAnswers()
    {
        return $this->hasMany(StudAnswer::className(), ['choice_id' => 'id', 'choice_question_id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['id' => 'student_id'])->viaTable('stud_answer', ['choice_id' => 'id', 'choice_question_id' => 'question_id']);
    }
}
