<?php
/**
 * ZfSmsZilla
 * Zend Framework 2 module for sending SMS through SmsZilla library.
 * @link https://github.com/Orajo/zf-sms-zilla Homepage
 * @link https://github.com/Orajo/sms-zilla SmsZilla homepage
 * @copyright Copyright (c) 2016 Jarosław Wasilewski <orajo@windowslive.com>
 * @license https://opensource.org/licenses/mit-license.php MIT License
 */

namespace ZfSmsZilla\Service;

use SmsZilla\SmsSender;

/**
 * SenderService for easy sending SMS messages using SmsZilla library.
 *
 * @author Jarosław Wasilewski <orajo@windowslive.com>
 */
class SenderService {

    /**
     * @var \SmsSender\SmsSenderInterface
     */
    private $sender = null;

    public function __construct($adapter, $adapterParams = []) {
        $adapterObj = new $adapter($adapterParams);

        $this->sender = new SmsSender($adapterObj);
    }

    /**
     * Send SMS message using adapter selected in config file.
     * @param string $message
     * @param array|text $recipients
     * @return bool sending status
     */
    public function send($message, $recipients) {
        $this->sender->setText($message);
        $this->sender->setRecipient($recipients);
        return $this->sender->send();
    }

    /**
     * Gets SmsSender object
     * @return SmsZilla\SmsSender
     */
    public function getSender() {
        return $this->sender;
    }

}
