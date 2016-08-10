<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ZfSmsZilla\Service;

use SmsZilla\SmsSender;
use SmsZilla\Adapter;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

/**
 * Description of SenderService
 *
 * @author Jarek
 */
class SenderService implements ServiceLocatorAwareInterface {
    use \Zend\ServiceManager\ServiceLocatorAwareTrait;
    
    /**
     *
     * @var \SmsSender\SmsSenderInterface
     */
    private $sender = null;
    
    public function __construct($adapter, $adapterParams = []) {
        $adapterObj = new $adapter($adapterParams);
        
        $this->sender = new SmsSender($adapterObj);
    }
    
    public function send($message, $recipients) {
        $this->sender->setText($message);
        $this->sender->setRecipient($recipients);
        return $this->sender->send();
    }
}
