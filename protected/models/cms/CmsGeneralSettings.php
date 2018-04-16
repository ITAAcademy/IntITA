<?php

/**
 * This is the model class for table "cms_general_settings".
 *
 * The followings are the available columns in table 'cms_general_settings':
 * @property integer $id
 * @property integer $id_organization
 * @property string $logo
 * @property string $mobile_phone
 * @property string $mobile_phone_2
 * @property string $email
 * @property string $twitter
 * @property string $youtube
 * @property string $google
 * @property string $facebook
 * @property string $linkedin
 * @property string $instagram
 * @property string $footer_background_color
 * @property string $header_background_color
 * @property string $news_background_color
 * @property string $about_us_background_color
 * @property string $footer_link_color
 * @property string $header_link_color
 * @property string $general_link_color
 * @property string $footer_hover_color
 * @property string $header_hover_color
 * @property string $general_hover_color
 * @property string $footer_border_color
 * @property string $header_border_color
 * @property string $news_image_border_color
 * @property string $news_text_border_color
 * @property string $title_color
 * @property string $subtitle_color
 * @property string $text_color
 * @property string $icon_shadow_color
 *
 * The followings are the available model relations:
 * @property Organization $idOrganization
 */
class CmsGeneralSettings extends CActiveRecord
{

    use validationErrors;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_general_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_organization', 'required'),
			array('id_organization', 'numerical', 'integerOnly'=>true),
			array('logo, email, twitter, youtube, google, facebook, linkedin, instagram', 'length', 'max'=>255),
			array('mobile_phone, mobile_phone_2', 'length', 'max'=>50),
			array('footer_background_color, header_background_color, news_background_color, about_us_background_color, footer_link_color, header_link_color, general_link_color, footer_hover_color, header_hover_color, general_hover_color, footer_border_color, header_border_color, news_image_border_color, news_text_border_color, title_color, subtitle_color, text_color, icon_shadow_color', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_organization, logo, mobile_phone, mobile_phone_2, email, twitter, youtube, google, facebook, linkedin, instagram, footer_background_color, header_background_color, news_background_color, about_us_background_color, footer_link_color, header_link_color, general_link_color, footer_hover_color, header_hover_color, general_hover_color, footer_border_color, header_border_color, news_image_border_color, news_text_border_color, title_color, subtitle_color, text_color, icon_shadow_color', 'safe', 'on'=>'search'),
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
			'idOrganization' => array(self::BELONGS_TO, 'Organization', 'id_organization'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_organization' => 'Id Organization',
			'logo' => 'Logo',
			'mobile_phone' => 'Mobile Phone',
			'mobile_phone_2' => 'Mobile Phone 2',
			'email' => 'Email',
			'twitter' => 'Twitter',
			'youtube' => 'Youtube',
			'google' => 'Google',
			'facebook' => 'Facebook',
			'linkedin' => 'Linkedin',
			'instagram' => 'Instagram',
			'footer_background_color' => 'Footer Background Color',
			'header_background_color' => 'Header Background Color',
			'news_background_color' => 'News Background Color',
			'about_us_background_color' => 'About Us Background Color',
			'footer_link_color' => 'Footer Link Color',
			'header_link_color' => 'Header Link Color',
			'general_link_color' => 'General Link Color',
			'footer_hover_color' => 'Footer Hover Color',
			'header_hover_color' => 'Header Hover Color',
			'general_hover_color' => 'General Hover Color',
			'footer_border_color' => 'Footer Border Color',
			'header_border_color' => 'Header Border Color',
			'news_image_border_color' => 'News Image Border Color',
			'news_text_border_color' => 'News Text Border Color',
			'title_color' => 'Title Color',
			'subtitle_color' => 'Subtitle Color',
			'text_color' => 'Text Color',
			'icon_shadow_color' => 'Icon Shadow Color',
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
		$criteria->compare('id_organization',$this->id_organization);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('mobile_phone',$this->mobile_phone,true);
		$criteria->compare('mobile_phone_2',$this->mobile_phone_2,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('youtube',$this->youtube,true);
		$criteria->compare('google',$this->google,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('instagram',$this->instagram,true);
		$criteria->compare('footer_background_color',$this->footer_background_color,true);
		$criteria->compare('header_background_color',$this->header_background_color,true);
		$criteria->compare('news_background_color',$this->news_background_color,true);
		$criteria->compare('about_us_background_color',$this->about_us_background_color,true);
		$criteria->compare('footer_link_color',$this->footer_link_color,true);
		$criteria->compare('header_link_color',$this->header_link_color,true);
		$criteria->compare('general_link_color',$this->general_link_color,true);
		$criteria->compare('footer_hover_color',$this->footer_hover_color,true);
		$criteria->compare('header_hover_color',$this->header_hover_color,true);
		$criteria->compare('general_hover_color',$this->general_hover_color,true);
		$criteria->compare('footer_border_color',$this->footer_border_color,true);
		$criteria->compare('header_border_color',$this->header_border_color,true);
		$criteria->compare('news_image_border_color',$this->news_image_border_color,true);
		$criteria->compare('news_text_border_color',$this->news_text_border_color,true);
		$criteria->compare('title_color',$this->title_color,true);
		$criteria->compare('subtitle_color',$this->subtitle_color,true);
		$criteria->compare('text_color',$this->text_color,true);
		$criteria->compare('icon_shadow_color',$this->icon_shadow_color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsGeneralSettings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
