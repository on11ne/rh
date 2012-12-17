<?php

/**
 * This is the model class for table "tbl_users".
 *
 * The followings are the available columns in table 'tbl_users':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $activation_key
 * @property integer $status
 * @property string $registered_date
 *
 * The followings are the available model relations:
 * @property TblCheques[] $tblCheques
 * @property TblFeedback[] $tblFeedbacks
 */
class User extends CActiveRecord
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
		return 'tbl_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, phone, password, registered_date', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, email, password, activation_key', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, phone, password, activation_key, status, registered_date', 'safe', 'on'=>'search'),
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
			'tblCheques' => array(self::HAS_MANY, 'TblCheques', 'user_id'),
			'tblFeedbacks' => array(self::HAS_MANY, 'TblFeedback', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Фамилия и имя',
			'email' => 'E-mail',
			'phone' => 'Мобильный телефон',
			'password' => 'Пароль',
			'activation_key' => 'Ключ активации',
			'status' => 'Статус',
			'registered_date' => 'Дата регистрации',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('registered_date',$this->registered_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}