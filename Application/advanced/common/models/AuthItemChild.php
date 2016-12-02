<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "auth_item_child".
 *
 * @property string $auth_item_name
 * @property string $auth_item_name1
 *
 * @property AuthItem $authItemName
 * @property AuthItem $authItemName1
 */
class AuthItemChild extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_item_name', 'auth_item_name1'], 'required'],
            [['auth_item_name', 'auth_item_name1'], 'string', 'max' => 64],
            [['auth_item_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['auth_item_name' => 'name']],
            [['auth_item_name1'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['auth_item_name1' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'auth_item_name' => 'Auth Item Name',
            'auth_item_name1' => 'Auth Item Name1',
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
    public function getAuthItemName1()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'auth_item_name1']);
    }
}
