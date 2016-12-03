<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property integer $user_id
 * @property integer $employee_id
 * @property string $auth_item_name
 * @property string $created_at
 *
 * @property AuthItem $authItemName
 * @property Employee $employee
 * @property User $user
 */
class AuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'employee_id'], 'integer'],
            [['auth_item_name'], 'required'],
            [['created_at'], 'safe'],
            [['auth_item_name'], 'string', 'max' => 64],
            [['auth_item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['auth_item_name' => 'name']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'employee_id' => 'Employee ID',
            'auth_item_name' => 'Auth Item Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'auth_item_name']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
