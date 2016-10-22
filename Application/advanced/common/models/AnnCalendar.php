<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ann_calendar".
 *
 * @property integer $id
 * @property string $announcement
 * @property integer $employee_id
 * @property integer $task_id
 * @property integer $task_course_id
 * @property integer $task_course_employee_id
 *
 * @property Task $task
 * @property Employee $employee
 */
class AnnCalendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ann_calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'announcement', 'employee_id', 'task_id', 'task_course_id', 'task_course_employee_id'], 'required'],
            [['id', 'employee_id', 'task_id', 'task_course_id', 'task_course_employee_id'], 'integer'],
            [['announcement'], 'string', 'max' => 45],
            [['task_id', 'task_course_id', 'task_course_employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id', 'task_course_id' => 'course_id', 'task_course_employee_id' => 'course_employee_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'announcement' => 'Announcement',
            'employee_id' => 'Employee ID',
            'task_id' => 'Task ID',
            'task_course_id' => 'Task Course ID',
            'task_course_employee_id' => 'Task Course Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id', 'course_id' => 'task_course_id', 'course_employee_id' => 'task_course_employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
}
