<?php

namespace Theme\Providers;

use IO\Helper\TemplateContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class ThemeServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {

    }

    /**
     * Boot a template for the basket that will be displayed in the template plugin instead of the original basket.
     */
    public function boot(Twig $twig, Dispatcher $eventDispatcher)
    {
        $eventDispatcher->listen('IO.tpl.category.item', function(TemplateContainer $container, $templateData)
        {
            $container->setTemplate('Theme::content.ThemeBasket');
            return false;
        }, 0);
    }
}