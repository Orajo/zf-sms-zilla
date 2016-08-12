# zf-sms-sender
Zend Framework 2 module for sending SMS messages

This module is based on https://github.com/Orajo/sms-zilla library. 

======

Installation
------------

use [composer](http://getcomposer.org/)

    {
        "require": {
            "orajo/zf-sms-zilla": "1.*"
        }
    }

or

    php composer.phar require orajo/zf-sms-zilla
    
Remember to register module in application.config.php:
```php
'modules' => array(
  'Application',
  'ZfSmsZilla'
),
```

Usage
------------
```php
public function smsAction() {
  /**
   * @var \ZfSmsZilla\Service\SenderService
   */
  $smsService = $this->getServiceLocator()->get('ZfSmsZillaService');
  $smsService->send('Lorem ipsum 1', ['+41759987654']);
  $smsService->send('Lorem ipsum 2', ['605123456', '509546985']);
  
  // if you need more, e.g.
  $sender = $smsService->getSender();
  $errors = $sender->getAdapter()->getErrors();
  $sender->setValidator(new SmsZilla\Validator\LibphonenumberValidator('US'));
}

```
