<?php

/**
 * This is the model class for table "banners_for_graduates".
 *
 * The followings are the available columns in table 'banners_for_graduates':
 * @property integer $id
 * @property string $file_path
 * @property integer $slide_position
 * @property integer $visible
 * @property string $url
 * @property string $text
 */
class BannersForGraduates extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banners_for_graduates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_path', 'required'),
			array('slide_position, visible', 'numerical', 'integerOnly'=>true),
            array('file_path, url', 'length', 'max'=>255),
            array('url', 'url'),
			array('file_path', 'length', 'max'=>255),
            array('text', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, file_path, slide_position, visible', 'safe', 'on'=>'search'),
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
			'file_path' => 'File Path',
			'slide_position' => 'Slide Position',
			'visible' => 'Visible',
            'url' => 'Url',
            'text' => 'Text',
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
		$criteria->compare('file_path',$this->file_path,true);
		$criteria->compare('slide_position',$this->slide_position);
		$criteria->compare('visible',$this->visible);
        $criteria->compare('url',$this->url);
        $criteria->compare('text',$this->text);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BannersForGraduates the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function uploadBanner(){
        $path =  $path=Yii::getPathOfAlias('webroot')."/images/bannersForGraduates";
        if (!is_dir($path)){
            mkdir($path,0777,true);
        }
        $image = $_FILES['file'];
        $img = new CUploadedFile($image['name'],$image['tmp_name'],$image['type'],$image['size'],$image['error']);
        if($img->saveAs("{$path}/{$image['name']}")){
            $this->file_path = '/images/bannersForGraduates/'.$img->getName();
            $callUrl = new CurlHelper();
            $callUrl->loadImageToDependServer(Config::getDependentServer().'/graduate/uploadBanner', $img->getName(), Config::getBaseUrl() . "/images/bannersForGraduates/" . $img->getName());
            if($this->save()){
                return true;
            }
        }
        return false;

    }
    public function delete(){
        if(parent::delete()){
            $this->deleteImageFile();
            return true;
        }
        return false;
    }

    public function changeStatus(){
        $this->visible = (int)!$this->visible;
        return $this->save();
    }

    public function deleteImageFile(){
        $file =  $path=Yii::getPathOfAlias('webroot').$this->file_path;
        $callUrl = new CurlHelper();
        $callUrl->unlinkImageFromDependServer(Config::getDependentServer() . '/graduate/unlinkBanner', substr($this->file_path, strrpos($this->file_path, '/') + 1));
        return @unlink($file);
    }

    public function changePosition($position){
        if ($position < $this->slide_position){
            $recalcBanners = BannersForGraduates::model()->findAll('slide_position >= :newPosition AND slide_position < :oldPosition',['newPosition'=>$position,'oldPosition'=>$this->slide_position]);
            foreach ($recalcBanners as $newPos){
                $newPos->slide_position = ++$newPos->slide_position;
                $newPos->save();
            }

        }
        else{
            $recalcBanners = BannersForGraduates::model()->findAll('slide_position > :oldPosition AND slide_position <= :newPosition',['newPosition'=>$position, 'oldPosition'=>$this->slide_position]);
            foreach ($recalcBanners as $newPos){
                $newPos->slide_position = --$newPos->slide_position;
                $newPos->save();
            }
        }
        $this->slide_position = $position;
        return $this->save();
    }
}
