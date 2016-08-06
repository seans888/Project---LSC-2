<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property string $day
 * @property string $time
 * @property string $subject
 * @property integer $student_id
 * @property integer $course_id
 *
 * @property Course $course
 * @property Student $student
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['day', 'time', 'subject', 'student_id', 'course_id'], 'required'],
            [['student_id', 'course_id'], 'integer'],
            [['day'], 'string', 'max' => 10],
            [['time', 'subject'], 'string', 'max' => 45],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day' => 'Day',
            'time' => 'Time',
            'subject' => 'Subject',
            'student_id' => 'Student ID',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
