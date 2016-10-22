<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $age
 * @property string $gender
 * @property string $cell_number
 * @property string $email_add
 * @property string $home_add
 * @property string $employee_type
 *
 * @property AnnCalendar[] $annCalendars
 * @property Course[] $courses
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'age', 'gender', 'home_add'], 'required'],
            [['first_name', 'last_name', 'middle_name', 'age', 'gender', 'cell_number', 'email_add', 'home_add', 'employee_type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'age' => 'Age',
            'gender' => 'Gender',
            'cell_number' => 'Cell Number',
            'email_add' => 'Email Add',
            'home_add' => 'Home Add',
            'employee_type' => 'Employee Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnnCalendars()
    {
        return $this->hasMany(AnnCalendar::className(), ['employee_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['employee_id' => 'id']);
    }
}
