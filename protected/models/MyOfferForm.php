<?php

/**
 * This is the model class for table "hts_favorites".
 *
 * The followings are the available columns in table 'hts_favorites':
 * @property integer $id
 * @property integer $userId
 * @property integer $productId
 */
class MyOfferForm extends CFormModel
{
	public $offer_rate;
	public $name;
	public $email;
	public $phone;
	public $message;
	/**
	 * @return string the associated database table name
	 */

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('offer_rate, name, email,phone,message', 'required'),
		array('name','match','pattern'=>'/^[\p{L}\p{N} .-]+$/u','message'=>'Special Characters not allowed'),
		array('offer_rate, phone', 'numerical', 'integerOnly'=>true),
		array('email','email'),
	//	array('phone','length','min'=> 10),
		// The following rule is used by search().
		// @todo Please remove those attributes that should not be searched.
		array('offer_rate, name,email,phone,message', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'offer_rate' => Yii::t('app','My Offer'),
			'name' => Yii::t('app','Name'),
		    'email' => Yii::t('app','Email'),
		    'phone' => Yii::t('app','Phone'),
		    'message' => Yii::t('app','Message'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name);
		$criteria->compare('email',$this->email);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Favorites the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
