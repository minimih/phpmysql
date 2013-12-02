<?php

/**
 * This is the model class for table "episoden".
 *
 * The followings are the available columns in table 'episoden':
 * @property integer $NR_TOTAL
 * @property integer $NR_STAFFEL
 * @property string $DEUTSCHER_TITEL
 * @property string $ORIGINAL­TITEL
 * @property string $ERSTAUS­STRAHLUNG_USA
 * @property string $DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­
 * @property string $REGIE
 * @property string $DREHBUCH
 * @property string $US_QUOTEN
 * @property string $INHALT
 */
class Episode extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'episoden';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NR_TOTAL, NR_STAFFEL, DEUTSCHER_TITEL, ORIGINAL­TITEL, ERSTAUS­STRAHLUNG_USA, DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­, REGIE, DREHBUCH, US_QUOTEN, INHALT', 'required'),
			array('NR_TOTAL, NR_STAFFEL', 'numerical', 'integerOnly'=>true),
			array('DEUTSCHER_TITEL, ORIGINAL­TITEL, ERSTAUS­STRAHLUNG_USA, DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­, REGIE, DREHBUCH, US_QUOTEN', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('NR_TOTAL, NR_STAFFEL, DEUTSCHER_TITEL, ORIGINAL­TITEL, ERSTAUS­STRAHLUNG_USA, DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­, REGIE, DREHBUCH, US_QUOTEN, INHALT', 'safe', 'on'=>'search'),
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
			'NR_TOTAL' => 'Nr Total',
			'NR_STAFFEL' => 'Nr Staffel',
			'DEUTSCHER_TITEL' => 'Deutscher Titel',
			'ORIGINAL­TITEL' => 'Original­ Titel',
			'ERSTAUS­STRAHLUNG_USA' => 'Erstaus­ Strahlung Usa',
			'DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­' => 'Deutsch­ Sprachige Erstaus­ Strahlung­',
			'REGIE' => 'Regie',
			'DREHBUCH' => 'Drehbuch',
			'US_QUOTEN' => 'Us Quoten',
			'INHALT' => 'Inhalt',
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

		$criteria->compare('NR_TOTAL',$this->NR_TOTAL);
		$criteria->compare('NR_STAFFEL',$this->NR_STAFFEL);
		$criteria->compare('DEUTSCHER_TITEL',$this->DEUTSCHER_TITEL,true);
		$criteria->compare('ORIGINAL­TITEL',$this->ORIGINAL­TITEL,true);
		$criteria->compare('ERSTAUS­STRAHLUNG_USA',$this->ERSTAUS­STRAHLUNG_USA,true);
		$criteria->compare('DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­',$this->DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­,true);
		$criteria->compare('REGIE',$this->REGIE,true);
		$criteria->compare('DREHBUCH',$this->DREHBUCH,true);
		$criteria->compare('US_QUOTEN',$this->US_QUOTEN,true);
		$criteria->compare('INHALT',$this->INHALT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Episode the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
