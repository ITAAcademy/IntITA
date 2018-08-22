<?php

/**
 * This is the model class for table "vacation_type".
 *
 * The followings are the available columns in table 'vacation_type':
 * @property integer $id
 * @property integer $vacation_type_id
 * @property integer $user_id
 * @property integer $organisation_id
 * @property string $start_date
 * @property string $end_date
 * @property string $task_name
 * @property string $description
 * @property string $comment
 * @property integer $status
 * @property string $file_src
 *
 * The followings are the available model relations:
 * @property Vacation $vacation_type_id
 */
class VacationType extends CActiveRecord
{
	/**
   * @return string the associated database table name
   */
   public function tableName()
	{
	 return 'vacations';
	}

	/**
   * @return array validation rules for model attributes.
   */
   public function rules()
    {
     // NOTE: you should only define rules for those attributes that
     // will receive user inputs.
     return array(
         array('start_date, end_date, status, organisation_id, user_id, vacation_type_id', 'required'),
         array('status', 'in','range'=>range(0,2));
         array('task_name', 'length', 'max' => 256),
         array('description, comment', 'length', 'max' => 1512),
         array('file_src', 'length', 'max' => 256),
         array('start_date, end_date', 'type', 'type' => 'date', 'message' => '{attribute}: is not a date!'),
         // The following rule is used by search().
         // @todo Please remove those attributes that should not be searched.
         array('id, vacation_type_id, user_id, organisation_id, description, start_date, end_date, status, task_name, comment, file_src', 'safe', 'on' => 'search'),
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
         'vacationType' => array(self::HAS_MANY, 'VacationType', 'vacation_type_id'),
     );
    }

    /**
   * @return array customized attribute labels (name=>label)
   */
   public function attributeLabels()
    {
     return array(
         'id'               => 'ID',
         'vacation_type_id' => 'Vacation Type ID',
         'user_id'          => 'User ID',
         'organisation_id'  => 'Organisation ID',
         'description'      => 'Description',
         'start_date'       => 'Start Date',
         'status'           => 'Status',
         'end_date'         => 'End Date',
         'task_name'        => 'Task Name',
         'comment'          => 'Comment',
         'file_src'         => 'File Link',
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

     $criteria = new CDbCriteria;

     $criteria->compare('id', $this->id);
     $criteria->compare('vacation_type_id', $this->vacation_type_id, true);
     $criteria->compare('user_id', $this->user_id, true);
     $criteria->compare('organisation_id', $this->organisation_id, true);
     $criteria->compare('description', $this->description, true);
     $criteria->compare('start_date', $this->start_date, true);
     $criteria->compare('status', $this->status, true);
     $criteria->compare('end_date', $this->end_date, true);
     $criteria->compare('task_name', $this->task_name, true);
     $criteria->compare('comment', $this->comment, true);
     $criteria->compare('file_src', $this->file_src, true);

     return new CActiveDataProvider($this, array(
         'criteria' => $criteria,
     ));
   }

    /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Library the static model class
   */
   public static function model($className = __CLASS__)
    {
     return parent::model($className);
    }
}