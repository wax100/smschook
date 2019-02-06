<?php

$settings = array();

$tmp = array(
    'login'=> array(
        'xtype' => 'textfield',
        'value' => '',
        'area' => 'default',
    ),
    'password'=> array(
        'xtype' => 'password',
        'value' => '',
        'area' => 'default',
    ),
    'phones'=> array(
        'xtype' => 'textfield',
        'value' => '',
        'area' => 'default',
    ),

);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
            'key' => PKG_NAME_LOWER.'_'.$k,
            'namespace' => PKG_NAME_LOWER,
            'area' => PKG_NAME_LOWER.'_main',
		), $v
	),'',true,true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
