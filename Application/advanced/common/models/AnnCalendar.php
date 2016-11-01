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
            [['id', 'announcement', 'employee_id', 'task_id'], 'required'],
            [['id', 'employee_id', 'task_id'], 'integer'],
            [['announcement'], 'string', 'max' => 50],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
}
