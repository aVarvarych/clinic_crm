<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $video
 * @property int $created_at
 * @property int $updated_at
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'email', 'phone', 'created_at', 'updated_at', 'position'], 'string', 'max' => 259],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
            'email' => 'Email',
            'phone' => 'Phone',
            'user_id' => 'User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
