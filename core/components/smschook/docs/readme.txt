--------------------
smschook
--------------------
Author: Yana Vostryakova <wax100@gmail.com>
--------------------

Нужно добавить _smschook_ в _hooks_ вызова сниппета (перед mail). В системных настройках Formit указать ключи:

*   Логин - _smsc.login_
*   Пароль - _smsc.password_
*   Телефоны - _smsc.phones_ в формате КОД СТРАНЫ + НОМЕР ТЕЛЕФОНА (без +), можно указать несколько через запятую
*   smschook_message - параметр, в который нужно передать текст сообшения
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
    'smschook_message' => 'Новое сообщение на сайта [[++site_name]]',
]}
```