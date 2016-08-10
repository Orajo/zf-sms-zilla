<?php
return array(
    'sms-zilla' => [
        'adapter' => 'SmsZilla\Adapter\FileAdapter',
        'params' => [
            'FileAdapter' => [
                'store_path' => __DIR__ . '/../../../data/sms'
            ],
            'MockAdapter' => [
            ],
            'SmsApiAdapter' => [
                'token' => '',
            ],
            'CiscoAdapter' => [
                'use_ssh' => true,
                'ssh_host' => '127.0.0.1',
                'ssh_login' => 'dummy'
            ],
            'SmsCenter' => [
                'login' => '',
                'password' => '',
                'sender' => ''
            ]
        ],
    ],
    'service_manager' => [
        'factories' => [
            'ZfSmsZillaService' => 'ZfSmsZilla\Service\SenderServiceFactory',
        ],
    ],
);