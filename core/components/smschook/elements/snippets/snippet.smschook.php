<?php
$phones = $scriptProperties['smschook_phones'];
if (empty($phones)) {
    $phones = $modx->getOption('smschook_phones', null, '');
}
$tpl = $scriptProperties['smschook_tpl'];
$formFields = $hook->getValues();
$mes = $modx->parseChunk($tpl, $formFields);
$data = [
    'login' => $modx->getOption('smschook_login', null, ''),
    'psw' => $modx->getOption('smschook_password', null, ''),
    'phones' => $phones,
    'mes' => $mes,
];

if (empty($data['login']) || empty($data['psw'])
    || empty($data['phones']) || empty($data['mes']) || empty($scriptProperties['smschook_tpl'])) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[smscHook] Error sending SMS: empty login, password, phones, message or tpl');

    return true;
}

$link = 'https://smsc.ru/sys/send.php?login=' . $data['login'] . '&psw=' . $data['psw'] . '&phones=' . $data['phones'] . '&mes=' . $data['mes'] . '&charset=utf-8';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $link);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200 && substr($res, 0, 2) == 'OK') {
    curl_close($ch);

    return true;
}
$modx->log(modX::LOG_LEVEL_ERROR, '[smscHook] Error sending SMS: ' . print_r(curl_getinfo($ch), true));
curl_close($ch);

return true;