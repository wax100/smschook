Нужно добавить _smschook_ в _hooks_ вызова сниппета (перед mail). В системных настройках Formit указать ключи:

*   _smschook_tpl_ - создайте чанк по аналогии с чанком emailTpl
*   Логин - _smschook_login_
*   Пароль - _smschook_password_
*   Телефоны - _smschook_phones_ в формате КОД СТРАНЫ + НОМЕР ТЕЛЕФОНА (без +), можно указать несколько через запятую
*   _smschook_message_ - параметр, в который нужно передать текст сообщения
*   _smschook_phones_ - параметр, в который можно передать телефоны (если пусто, используется из системных настроек)

### Пример вызова:

```
{'!AjaxForm' | snippet : [
    'snippet' => 'FormIt',
    'form' => 'tpl.AjaxForm.example',
    'emailTpl' => 'contactEmailTpl',
    'hooks' => 'smschook,email',
    'emailFrom' => $_modx->config.emailsender,
    'emailFromName' => $_modx->config.site_name,
    'emailSubject' => 'Сообщение с сайта' ~ $_modx->config.site_name,
    'emailTo' => $_modx->config.emailsender,
    'validate' => 'name:required',
    'validationErrorMessage' => 'В форме содержатся ошибки!',
    'successMessage' => 'Сообщение успешно отправлено',
    'smschook_tpl' => 'smshookTpl',
    'smschook_phones' => '79998881234,78889994321',
]}
```

### smshookTpl
```
Сообщение от [[+phone]] с сайта [[++site_name]].
```