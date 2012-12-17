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
 */
class User extends CActiveRecord
{

    const NOT_ACTIVATED = 0;
    const NOT_MODERATED = 1;
    const MODERATED = 2;

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

            array('email, password, name, agree, phone', 'required'),

            array('email', 'email'),
            array('email', 'length', "min" => 3, "max" => 32),
            array('email', 'unique', 'className' => 'User'),

            array('password', 'length', "min" => 6, "max" => 32),
            array('password', 'match', 'pattern'=>'/^([a-z0-9_])+$/i'),

            array('name', 'match', 'pattern'=>'/^([\x{0410}-\x{042F}\s]){3,32}$/iu'),

            array('phone', 'match', 'pattern'=>'/^\+7\s\(?[0-9]{3}\)?|[0-9]{3}[-. ]? [0-9]{3}[-. ]?[0-9]{4}$/'),
            array('phone', 'unique', 'className' => 'User', 'attributeName' => 'phone'),

            array('agree', 'compare', 'compareValue' => 1, 'message' => 'Вы должны подтвердить согласие с условиями акции'),

			array('status', 'numerical', 'integerOnly' => true),

			array('id, name, email, phone, password, activation_key, status, registered_date, agree', 'safe', 'on'=>'search'),
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
			'Cheque' => array(self::HAS_MANY, 'Cheque', 'user_id'),
			'Feedback' => array(self::HAS_MANY, 'Feedback', 'user_id'),
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
            'agree' => 'Согласие с условиями акции',
		);
	}

    public function beforeSave() {

        if (!empty($this->password) && $this->status == 0)
            $this->password = md5($this->password . Yii::app()->params['salt']);

        return true;
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
        $criteria->compare('agree',$this->agree,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}