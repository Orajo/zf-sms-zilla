<?php
return array(
    'sms-zilla' => [
        'adapter' => 'SmsZilla\Adapter\FileAdapter',
        'params' => [
            'FileAdapter' => [
                'store_path' => __DIR__ . '/../../data/sms'
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
            'SmsCenterAdapter' => [
                'login' => '',
                'password' => '',
                'sender' => ''
            ],
            'InfobipAdapter' => [
				'sender' => 'InfoSMS',
				'token' => '',
            ],
            'Clickatell' => [
				'token' => '',
            ],
            'SerwerSms' => [
                'login' => '',
                'password' => '',
                'sender' => null // ECO
            ]
        ],
    ],
    'service_manager' => [
        'factories' => [
            'ZfSmsZillaService' => 'ZfSmsZilla\Service\SenderServiceFactory',
        ],
    ],
);