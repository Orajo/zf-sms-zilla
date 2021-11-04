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

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * SenderServiceFactory
 *
 * @author Jarosław Wasilewski <orajo@windowslive.com>
 */
class SenderServiceFactory implements FactoryInterface {
    
    /**
     * @inheritDoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $config = $container->get('Config');
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
