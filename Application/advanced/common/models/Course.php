<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $name
 * @property string $course_description
 * @property string $time_created
 * @property string $date_created
 * @property integer $employee_id
 *
 * @property ClassList[] $classLists
 * @property User[] $users
 * @property Employee $employee
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
            [['name', 'employee_id'], 'required'],
            [['time_created', 'date_created'], 'safe'],
            [['employee_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['course_description'], 'string', 'max' => 200],
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
            'name' => 'Name',
            'course_description' => 'Course Description',
            'time_created' => 'Time Created',
            'date_created' => 'Date Created',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassLists()
    {
        return $this->hasMany(ClassList::className(), ['course_id' => 'id', 'course_employee_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('class_list', ['course_id' => 'id', 'course_employee_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['course_id' => 'id', 'course_employee_id' => 'employee_id']);
    }
}
