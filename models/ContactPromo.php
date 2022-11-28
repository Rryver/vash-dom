<?php


namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is class model for table '{{%contact_promo}}'
 * @package app\models
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $message
 * @property int $isNew
 * @property int $promo_id
 * @property string $promo_name_when_created_at
 * @property int $created_at
 * @property int $updated_at
 */
class ContactPromo extends GeneralModel
{
    public int $check;

    public static function tableName()
    {
        return '{{%contact_promo}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['email'], 'email'],
            [['name'], 'string', 'max' => 255],
            [['message'], 'string'],
            [['isNew'], 'int'],

            [['check'], 'in', 'range' => ['142']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
            'message' => 'Сообщение',
            'isNew' => 'Новое?',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }
}