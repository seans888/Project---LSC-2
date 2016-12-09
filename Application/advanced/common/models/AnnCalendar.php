<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ann_calendar".
 *
 * @property integer $id
 * @property string $announcement
 * @property integer $user_id
 * @property integer $task_id
 *
 * @property Task $task
 * @property User $user
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
            [['id', 'announcement'], 'required'],
            [['id', 'user_id', 'task_id'], 'integer'],
            [['announcement'], 'string', 'max' => 50],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
