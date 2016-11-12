<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
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
 * @property string $date_registered
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date_registered'], 'required'],
            [['id'], 'integer'],
            [['gender'], 'string'],
            [['date_registered'], 'safe'],
            [['first_name', 'last_name', 'middle_name', 'age'], 'string', 'max' => 45],
            [['cell_number'], 'string', 'max' => 15],
            [['email_add'], 'string', 'max' => 100],
            [['home_add'], 'string', 'max' => 255],
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
            'date_registered' => 'Date Registered',
        ];
    }
}
