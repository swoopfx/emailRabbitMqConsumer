<?php

namespace Application\Controller\Factory;

use Application\Controller\Consumer;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class ConsumerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new Consumer($container->get("acmailer.mailservice.default"));
    }
}