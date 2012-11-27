<?php
namespace application\models;
/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email_address
 * @property string $password
 * @property string $password_hash
 * @property string $activation_key
 * @property integer $has_activated
 */
class User extends \CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, email_address', 'required'),
			array('has_activated', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name', 'length', 'max'=>128),
			array('email_address', 'length', 'max'=>255),
			array('password_hash', 'length', 'max'=>64),
			array('activation_key', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, first_name, middle_name, last_name, email_address, password_hash, activation_key, has_activated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'email_address' => 'Email Address',
            'password' => 'Password',
			'password_hash' => 'Password Hash',
			'activation_key' => 'Activation Key',
			'has_activated' => 'Has Activated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('password_hash',$this->password_hash,true);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('has_activated',$this->has_activated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}