<?php

/**
 * This is the model class for table "hts_messages".
 *
 * The followings are the available columns in table 'hts_messages':
 * @property integer $messageId
 * @property integer $chatId
 * @property integer $senderId
 * @property string $message
 * @property integer $sourceId
 * @property string $messageType
 * @property integer $createdDate
 */
class Messages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hts_messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('chatId, senderId, message, sourceId, messageType, createdDate', 'required'),
			array('chatId, senderId, sourceId, createdDate', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>500),
			array('messageType', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('messageId, chatId, senderId, message, sourceId, messageType, createdDate', 'safe', 'on'=>'search'),
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
			'messageId' => 'Message',
			'chatId' => 'Chat',
			'senderId' => 'Sender',
			'message' => 'Message',
			'sourceId' => 'Source',
			'messageType' => 'Message Type',
			'createdDate' => 'Created Date',
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

		$criteria->compare('messageId',$this->messageId);
		$criteria->compare('chatId',$this->chatId);
		$criteria->compare('senderId',$this->senderId);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('sourceId',$this->sourceId);
		$criteria->compare('messageType',$this->messageType,true);
		$criteria->compare('createdDate',$this->createdDate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Messages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
