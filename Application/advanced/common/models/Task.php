<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property string $date_created
 * @property string $time_open
 * @property string $date_open
 * @property string $time_close
 * @property string $task_type
 * @property string $time_remaining
 * @property integer $course_id
 * @property integer $course_employee_id
 * @property string $description
 * @property integer $attempts
 * @property string $time_created
 *
 * @property AnnCalendar[] $annCalendars
 * @property Question[] $questions
 * @property Course $course
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'date_open', 'course_id', 'course_employee_id'], 'required'],
            [['date_created', 'time_open', 'date_open', 'time_close', 'time_remaining', 'time_created'], 'safe'],
            [['task_type'], 'string'],
            [['course_id', 'course_employee_id', 'attempts'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 45],
            [['course_id', 'course_employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id', 'course_employee_id' => 'employee_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'date_created' => 'Date Created',
            'time_open' => 'Time Open',
            'date_open' => 'Date Open',
            'time_close' => 'Time Close',
            'task_type' => 'Task Type',
            'time_remaining' => 'Time Remaining',
            'course_id' => 'Course ID',
            'course_employee_id' => 'Course Employee ID',
            'description' => 'Description',
            'attempts' => 'Attempts',
            'time_created' => 'Time Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnnCalendars()
    {
        return $this->hasMany(AnnCalendar::className(), ['task_id' => 'id', 'task_course_id' => 'course_id', 'task_course_employee_id' => 'course_employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['task_id' => 'id', 'task_course_id' => 'course_id', 'task_course_employee_id' => 'course_employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id', 'employee_id' => 'course_employee_id']);
    }
}
