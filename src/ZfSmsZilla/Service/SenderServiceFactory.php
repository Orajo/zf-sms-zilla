<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ZfSmsZilla\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of SenderServiceFactory
 *
 * @author Jarek
 */
class SenderServiceFactory implements FactoryInterface {
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
         
        $config = $serviceLocator->get('Config');
        // get Adapter class from $config['sms-zilla']['adapter']
        
        $adapter = $config['sms-zilla']['adapter'];

        $params = [];
        // get config by fully qualified class name
        if (isset($config['sms-zilla']['params'][$adapter])) {
            $params = $config['sms-zilla']['params'][$adapter];
        }
        else {
            // try to get config only by class name
            $path = explode('\\', $adapter);
            $className = array_pop($path);
            if (isset($config['sms-zilla']['params'][$className])) {
                $params = $config['sms-zilla']['params'][$className];
            }
        }
        
        return new SenderService($adapter, $params);
    }
}
