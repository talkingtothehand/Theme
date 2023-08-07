<?php

namespace Theme\Providers;

use IO\Helper\TemplateContainer;
use IO\Helper\ComponentContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class ThemeServiceProvider extends ServiceProvider
{
  const PRIORITY = 0;

    /**
     * Register the service provider.
     */
    public function register()
    {

    }

    /**
     * Boot a template for the basket that will be displayed in the template plugin instead of the original basket.
     */
    public function boot(Twig $twig, Dispatcher $eventDispatcher, ConfigRepository $config)
    {
        $eventDispatcher->listen("IO.Resources.Import", function (ResourceContainer $container)
        {
            if ($container->getOriginComponentTemplate()=='Ceres::Item.Components.SingleItem')
            {
                $container->addScriptTemplate('Theme::content.SingleItem');
            }
        }, self::PRIORITY);
    }
}