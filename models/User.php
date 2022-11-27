<?php

namespace app\models;

use Yii;
use yii\base\DynamicModel;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $middle_name
 * @property string $surname
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $new_email
 * @property string $phone
 * @property string $auth_key
 * @property integer $status
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $password_old;
    public $password_repeat;

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const ROLE_USER = 10;
    const ROLE_MODERATOR = 20;
    const ROLE_ADMIN = 30;

    const SCENARIO_PASSWORD = 'updatePassword';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'middle_name', 'surname', 'email', 'password_old'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 50],
            [['email', 'new_email'], 'email'],
            //[['username'], 'required'],
            [['username'], 'string', 'max' => 250, 'on' => self::SCENARIO_PASSWORD],

            [['password', 'password_repeat'], 'required', 'on' => self::SCENARIO_PASSWORD],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Passwords don\'t match')],
            ['password_hash', 'safe'],

            ['role', 'default', 'value' => self::ROLE_USER],

            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED, self::STATUS_INACTIVE]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'name' => Yii::t('app', 'Name'),
            'middle_name' => Yii::t('app', 'Middle name'),
            'surname' => Yii::t('app', 'Surname'),
            'password' => Yii::t('app', 'Password'),
            'password_repeat' => Yii::t('app', 'Repeat password'),
            'password_old' => Yii::t('app', 'Old password'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'status' => Yii::t('app', 'Status'),
            'role' => Yii::t('app', 'Role'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE],
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @param array $statusRange Можно задать среди каких статусов испкать ACTIVE, INACTIVE, DELETED
     * @return static|null
     */
    public static function findByVerificationToken($token, $statusRange = [])
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => $statusRange ?: self::STATUS_INACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function getPassword()
    {
        return $this->password_repeat;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function getEmailVerificationUrl()
    {
        return Url::to('/email-verification/' . $this->verification_token, true);
    }

    public function getEmailChangeUrl()
    {
        return Url::to('/email-change/' . $this->verification_token, true);
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Возвращает массив статусов
     */
    public static function getStatusOptions()
    {
        return [
            self::STATUS_DELETED => 'Не активен',
            self::STATUS_INACTIVE => 'Не подтвержден',
            self::STATUS_ACTIVE => 'Активен',
        ];
    }

    /**
     * Возвращает название статуса
     */
    public function getStatusName()
    {
        switch ($this->status) {
            case self::STATUS_DELETED:
                return 'Не активен';
            case self::STATUS_INACTIVE:
                return 'Не подтвержден';
            case self::STATUS_ACTIVE:
                return 'Активен';
        }
    }

    /**
     * Возвращает массив ролей
     */
    public static function getRoleOptions()
    {
        return [
            self::ROLE_USER => 'Пользователь',
            self::ROLE_MODERATOR => 'Модератор',
            self::ROLE_ADMIN => 'Администратор',
        ];
    }

    /**
     * Возвращает название роли
     */
    public function getRoleName()
    {
        $role = 'Нет роли';
        switch ($this->role) {
            case self::ROLE_USER:
                $role = 'Пользователь';
                break;
            case self::ROLE_MODERATOR:
                $role = 'Модератор';
                break;
            case self::ROLE_ADMIN:
                $role = 'Администратор';
                break;
        }
        return $role;
    }

    public static function printPhoneToFormByUserId($id)
    {
        $user = static::findOne(['id' => $id]);

        if ($user && $user->phone) {
            return substr($user->phone, '1');
        }
    }

    public function verifyEmail()
    {
        $this->status = self::STATUS_ACTIVE;

        if ($this->save()) {
            return true;
        } else {
            Yii::error('Подтверждение почты. Не удалось сохранить модель User.' . PHP_EOL .
                "User ID: " . $this->id . PHP_EOL .
                "Ошибка: " . json_encode($this->getErrors(), JSON_UNESCAPED_UNICODE));
            return false;
        }
    }

    public static function validateToken($token)
    {
        $validateModel = DynamicModel::validateData(compact('token'), [
            [['token'], 'trim'],
            [['token'], 'string', 'max' => 255],
        ]);

        if ($validateModel->hasErrors()) {
            return false;
        }

        return true;
    }
}