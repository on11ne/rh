<?php

/**
 * This is the model class for table "tbl_cheques".
 *
 * The followings are the available columns in table 'tbl_cheques':
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property string $store_title
 * @property string $store_address
 * @property string $phone
 * @property string $image
 * @property integer $status
 * @property string $registered_date
 *
 * The followings are the available model relations:
 * @property TblProducts $product
 * @property TblUsers $user
 */
class Cheque extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cheque the static model class
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
		return 'tbl_cheques';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, product_id, store_title, phone, image', 'required'),

            array('store_title', 'match', 'pattern'=>'/^([\x{0410}-\x{042F}\s0-9\-]){3,32}$/iu'),

            array('store_address', 'match', 'pattern'=>'/^([\x{0410}-\x{042F}\s0-9\-,]){3,32}$/iu'),

            array('product_id', 'exist', 'className' => 'Product', 'attributeName' => 'id'),

            array('user_id', 'exist', 'className' => 'User', 'attributeName' => 'id'),

            array('phone', 'match', 'pattern'=>'/^\+7\s\(?[0-9]{3}\)?|[0-9]{3}[-. ]? [0-9]{3}[-. ]?[0-9]{4}$/'),

            array('image', 'file', 'on'=>'create', 'maxSize' => 3000000, 'types' => 'jpg, png, gif'),
            array('image', 'file', 'on'=>'update', 'allowEmpty' => true, 'maxSize' => 3000000, 'types' => 'jpg, png, gif'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, product_id, store_title, store_address, phone, image, status, registered_date', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'Пользователь',
			'product_id' => 'Устройство',
			'store_title' => 'Название магазина',
			'store_address' => 'Адрес магазина',
			'phone' => 'Мобильный телефон',
			'image' => 'Фотография чека',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('store_title',$this->store_title,true);
		$criteria->compare('store_address',$this->store_address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('registered_date',$this->registered_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}