<?php

namespace Lib\Framework;

use App\ServiceProviders\ProviderInterface;
use DI\ContainerBuilder;
use Lib\Utils\DotNotation;
use Slim\Factory\AppFactory;

/**
 * Class App
 * @package Lib\Framework
 * @author  Jerfeson Guerreiro <jerfeson@codeis.com.br>
 * @since   1.0.0
 * @version 1.0.0
 */
class App
{
    const DEVELOPMENT = 'development';
    const PRODUCTION = 'production';

    public $appType;
    private $settings;

    /**
     * @var \Slim\App
     */
    private $app;

    /**
     * App constructor.
     * @param string $appType
     * @param array $settings
     * @throws \Exception
     */
    public function __construct($appType = '', $settings = [])
    {
        $this->appType = $appType;
        $this->settings = $settings;

        // Instantiate PHP-DI ContainerBuilder
        $containerBuilder = new ContainerBuilder();

        // Build PHP-DI Container instance
        $container = $containerBuilder->build();

        AppFactory::setContainer($container);
        $this->app = AppFactory::create();
        $callableResolver = $this->app->getCallableResolver();

        // Should be set to true in production
        if ($this->isProduction($this->settings)) {
            $containerBuilder->enableCompilation(__DIR__ . '/../var/cache');
        }
    }

    private static $instance = null;
    /**
     * Application Singleton Factory
     *
     * @param string $appName
     * @param array $settings
     * @return App
     */
    final public static function instance($appName = '', $settings = [])
    {
        if (null === static::$instance) {
            static::$instance = new static($appName, $settings);
        }

        return static::$instance;
    }

    /**
     * @param $settings
     * @return bool
     */
    public function isProduction($settings)
    {
        if ($settings['settings']['env'] == self::PRODUCTION) {
            return true;
        }

        return false;
    }

    /**
     * register providers
     *
     * @return void
     */
    public function registerProviders()
    {
        $providers = (array)$this->getConfig('providers');
        array_walk($providers, function(&$appName, $provider) {
            if (strpos($appName, $this->appName) !== false) {
                /** @var $provider ProviderInterface */
                $provider::register();
            }
        });
    }

    /**
     * register providers
     *
     * @return void
     */
    public function registerMiddleware()
    {
        $middlewares = array_reverse((array)$this->getConfig('middleware'));
        array_walk($middlewares, function($appType, $middleware) {
            if (strpos($appType, $this->appType) !== false) {
                $this->app->add(new $middleware);
            }
        });
    }

    /**
     * get configuration param
     *
     * @param string $param
     * @param string $defaultValue
     * @return mixed
     */
    public function getConfig($param, $defaultValue = null)
    {
        $dn = new DotNotation($this->settings);
        return $dn->get($param, $defaultValue);
    }

}