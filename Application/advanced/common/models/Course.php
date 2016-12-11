<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $name
 * @property string $course_description
 * @property string $date_created
 * @property integer $user_id
 *
 * @property ClassList[] $classLists
 * @property User[] $users
 * @property User $user
 * @property Task[] $tasks
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_created'], 'safe'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['course_description'], 'string', 'max' => 200],
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
            'name' => 'Course',
            'course_description' => 'Course Description',
            'date_created' => 'Date Created',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassLists()
    {
        return $this->hasMany(ClassList::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('class_list', ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['course_id' => 'id']);
    }
}
