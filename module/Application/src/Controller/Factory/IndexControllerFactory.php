<?php

namespace Application\Controller\Factory;

use Application\Controller\IndexController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class IndexControllerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $mailserveice = $container->get("acmailer.mailservice.default");
        // var_dump($mailserveice);
        // exit();
       $ctr = new IndexController($container->get("rabbitmq.consumer.login-trig"));
       $ctr->setMailservice($mailserveice);
       return $ctr;
    }
}