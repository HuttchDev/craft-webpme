<?php
namespace huttchdev\craftwebpme;
use Craft;
use huttchdev\craftwebpme\TwigExtension;

class Plugin extends \craft\base\Plugin
{
    public function init()
    {
        parent::init();
        Craft::$app->view->registerTwigExtension(new TwigExtension);
    }
}

?>