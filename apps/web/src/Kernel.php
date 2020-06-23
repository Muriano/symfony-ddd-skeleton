<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import(__DIR__ . '/../../../config/{packages}/*.yaml');
        $container->import(__DIR__ . '/../../../config/{packages}/'.$this->environment.'/*.yaml');

        if (is_file(\dirname(__DIR__).'/../../config/services.yaml')) {
            $container->import(__DIR__ . '/../../../config/{services}.yaml');
            $container->import(__DIR__ . '/../../../config/{services}_'.$this->environment.'.yaml');
        } elseif (is_file($path = \dirname(__DIR__).'/../../config/services.php')) {
            (require $path)($container->withPath($path), $this);
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(__DIR__ . '/../../../config/{routes}/'.$this->environment.'/*.yaml');
        $routes->import(__DIR__ . '/../../../config/{routes}/*.yaml');

        if (is_file(\dirname(__DIR__).'/../../config/routes.yaml')) {
            $routes->import(__DIR__ . '/../../../config/{routes}.yaml');
        } elseif (is_file($path = \dirname(__DIR__).'/../../../config/routes.php')) {
            (require $path)($routes->withPath($path), $this);
        }
    }

    public function getCacheDir()
    {
        return __DIR__ . '/../var/cache/' . $this->environment;
    }

    public function getLogDir()
    {
        return __DIR__ . '/../var/log/' . $this->environment;
    }
}
