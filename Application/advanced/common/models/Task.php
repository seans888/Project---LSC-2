<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $task_type
 * @property string $date_created
 * @property string $time_open
 * @property string $time_close
 * @property string $date_open
 * @property string $date_close
 * @property string $time_remaining
 * @property integer $attempts
 * @property integer $course_id
 *
 * @property AnnCalendar[] $annCalendars
 * @property Question[] $questions
 * @property Course $course
 */
class Task extends \yii\db\ActiveRecord
{
    public $questionCount;
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
            [['title', 'course_id'], 'required'],
            [['task_type'], 'string'],
            [['date_created', 'time_open', 'time_close', 'date_open', 'date_close', 'time_remaining'], 'safe'],
            [['attempts', 'course_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 150],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
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
            'description' => 'Description',
            'task_type' => 'Task Type',
            'date_created' => 'Date Created',
            'time_open' => 'Time Open',
            'time_close' => 'Time Close',
            'date_open' => 'Date Open',
            'date_close' => 'Date Close',
            'time_remaining' => 'Time Remaining',
            'attempts' => 'Attempts',
            'course_id' => 'Course',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnnCalendars()
    {
        return $this->hasMany(AnnCalendar::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }


}
