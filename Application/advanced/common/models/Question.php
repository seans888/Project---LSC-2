<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $ask
 * @property string $image
 * @property integer $task_id
 * @property integer $task_course_id
 * @property integer $task_course_employee_id
 *
 * @property Choice[] $choices
 * @property Task $task
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ask', 'task_id', 'task_course_id', 'task_course_employee_id'], 'required'],
            [['task_id', 'task_course_id', 'task_course_employee_id'], 'integer'],
            [['ask'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 8000],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ask' => 'Ask',
            'image' => 'Image',
            'task_id' => 'Task ID',
            'task_course_id' => 'Task Course ID',
            'task_course_employee_id' => 'Task Course Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChoices()
    {
        return $this->hasMany(Choice::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
}
