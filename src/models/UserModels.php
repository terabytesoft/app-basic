<?php

namespace app\basic\models;

use yii\activerecord\ActiveRecord;
use yii\base\Security;
use yii\behaviors\TimestampBehavior;
use yii\exceptions\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * User is the model Web Application Basic.
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $password write-only password
 **/
class UserModels extends ActiveRecord implements IdentityInterface
{
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;

    protected $_Security;

    /**
     * __construct
     *
     * @param Application $app
     **/
    public function __construct()
    {
        $this->_Security = new Security();
    }


    /**
     * tableName
     *
	 * @return string table name.
	 **/
	public static function tableName()
	{
		return '{{%user}}';
	}

	/**
     * behaviors
     *
	 * @return array behaviors config.
	 **/
	public function behaviors()
	{
		return [
			TimestampBehavior::class,
		];
	}

	/**
     * rules
     *
	 * @return array the validation rules.
	 **/
	public function rules()
	{
		return [
			['status', 'default', 'value' => self::STATUS_ACTIVE],
			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
		];
	}

	/**
     * findIdentity
     * Search user for id.
     *
	 * {@inheritdoc}
	 **/
	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
	}

	/**
     * findIdentityByAccessToken
     *
	 * {@inheritdoc}
	 **/
	public static function findIdentityByAccessToken($token, $type = null)
	{
		throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
	}

	/**
     * findByUsername
	 * Finds user by username.
	 *
	 * @param string $username
	 * @return static|null
	 **/
	public static function findByUsername($username)
	{
		return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
	}

	/**
     * findByPasswordResetToken
	 * Finds user by password reset token.
	 *
	 * @param string $token password reset token.
     * @param int $passwordResetTokenExpire password reset token.
	 * @return static|null
	 **/
	public static function findByPasswordResetToken($token, int $passwordResetTokenExpire)
	{
		if (!static::isPasswordResetTokenValid($token, $passwordResetTokenExpire)) {
			return null;
		}

		return static::findOne([
			'password_reset_token' => $token,
			'status' => self::STATUS_ACTIVE,
		]);
	}

	/**
	 * Finds out if password reset token is valid.
	 *
	 * @param string $token password reset token.
     * @param int $passwordResetTokenExpire password reset token.
	 * @return bool
	 **/
	public static function isPasswordResetTokenValid($token, int $passwordResetTokenExpire)
	{
		if (empty($token)) {
			return false;
		}

		$timestamp = (int) substr($token, strrpos($token, '_') + 1);
		$expire = $passwordResetTokenExpire;

		return $timestamp + $expire >= time();
	}

	/**
	 * getId
     *
     * @return int id.
	 **/
	public function getId()
	{
		return (int) ($this->getPrimaryKey());
	}

	/**
	 * getAuthKey
     *
     * @return string authentication key.
	 **/
	public function getAuthKey()
	{
		return $this->auth_key;
	}

	/**
     * validateAuthKey
     *
	 * @return bool validate authentication key.
	 **/
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}

	/**
     * validatePassword
	 * Validates password.
	 *
	 * @param string $password password to validate
	 * @return bool if password provided is valid for current user
	 **/
	public function validatePassword($password)
	{
		return $this->_Security->validatePassword($password, $this->password_hash);
	}

	/**
     * setPassword
	 * Generates password hash from password and sets it to the model.
	 *
	 * @param string $password
	 **/
	public function setPassword($password)
	{
		$this->password_hash = $this->_Security->generatePasswordHash($password);
	}

	/**
     * generateAuthKey
	 * Generates "remember me" authentication key.
     *
     * @return string authentication key.
	 **/
	public function generateAuthKey()
	{
		$this->auth_key = $this->_Security->generateRandomString();
	}

	/**
     * generatePasswordResetToken()
	 * Generates new password reset token.
     *
     * @return string new token.
	 **/
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = $this->_Security->generateRandomString() . '_' . time();
	}

	/**
     * removePasswordResetToken
	 * Removes password reset token.
     *
     * @return null
	 **/
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}
}
