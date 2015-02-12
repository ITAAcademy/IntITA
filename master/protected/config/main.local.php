<?php
/**
 * @copyright Alexander Palamarchuk, <a@palamarchuk.info> 
 */
mb_internal_encoding('UTF-8');

return array(
	'id'	=> 'AutoAdmin',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'AutoAdmin exemplary site',
	'language'=>'en',

	'import'=>array(
		'application.components.*',
		'application.models.*',
	),

	'modules'=>array(
	),

	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'caseSensitive'=>false,
			'showScriptName'=>false,
			'urlSuffix' => '/',
			'rules'=>array(
			),
		),
	),

	'params'=>array(
	),

);