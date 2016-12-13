<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $title
 * @property string $answer
 * @property string $answer2
 * @property string $answer3
 * @property string $answer4
 * @property string $answer5
 * @property string $answer6
 * @property integer $task_id
 *
 * @property Task $task
 * @property StudAnswer[] $studAnswers
 */
class Question extends \yii\db\ActiveRecord
{
    public $questionCount;
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
            [['title', 'task_id'], 'required'],
            [['task_id'], 'integer'],
            [['title', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6'], 'string', 'max' => 255],
            [['answer'], 'string', 'max' => 8000],
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
            'title' => 'Title',
            'answer' => 'Answer',
            'answer2' => 'Answer2',
            'answer3' => 'Answer3',
            'answer4' => 'Answer4',
            'answer5' => 'Answer5',
            'answer6' => 'Answer6',
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
    public function getStudAnswers()
    {
        return $this->hasMany(StudAnswer::className(), ['question_id' => 'id']);
    }
}
