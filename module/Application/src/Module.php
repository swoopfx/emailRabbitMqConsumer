<?php

declare(strict_types=1);

namespace Application;

use Laminas\ModuleManager\Feature\AutoloaderProviderInterface;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Laminas\Console\Adapter\AdapterInterface as Console;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ConsoleUsageProviderInterface
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }

   

    public function getAutoloaderConfig()
    {
        /* ... */
    }
    public function getConsoleUsage(Console $console)
    {
        return [
            // Describe available commands
            'user resetpassword [--verbose|-v] EMAIL' => 'Reset password for a user',

            // Describe expected parameters
            ['EMAIL',        'Email of the user for a password reset'],
            ['--verbose|-v', '(optional) turn on verbose mode'],
        ];
    }
}
