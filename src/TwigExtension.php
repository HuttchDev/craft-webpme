<?php
namespace huttchdev\craftwebpme;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Craft;

class TwigExtension extends AbstractExtension
{
    public function getName(): string 
    {
        return 'WebP Me';
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('WebP', function(craft\elements\Asset $image, Array $params = null){
                return $this->GetWebP($image, $params);
            }),
            new TwigFunction('WebPMe', function(craft\elements\Asset $image, Array $params = null){
                return $this->GetWebP($image, $params);
            }),
            new TwigFunction('webpMe', function(craft\elements\Asset $image, Array $params = null){
                return $this->GetWebP($image, $params);
            }),
            new TwigFunction('webpme', function(craft\elements\Asset $image, Array $params = null){
                return $this->GetWebP($image, $params);
            }),
            new TwigFunction('webp', function(craft\elements\Asset $image, Array $params = null){
                return $this->GetWebP($image, $params);
            }),
            new TwigFunction('IsWebPSupported', function(){
                return $this->WebPSupported();
            })
        ];
    }

    public function WebPSupported()
    {
        if(isset(Craft::$app->request->headers['accept']) && str_contains(Craft::$app->request->headers['accept'], 'image/webp') && Craft::$app->images->supportsWebP)
        {
            return true;
        }
        return false;
    }

    public function GetWebP(craft\elements\Asset $image, Array $params = null)
    {
        // Check if browser supports WebP
        $browserSupport = false;
        if(isset(Craft::$app->request->headers['accept']) && str_contains(Craft::$app->request->headers['accept'], 'image/webp'))
        {
            $browserSupport = true;
        }
        // Check if server supports WebP
        $serverSupport = false;
        if(Craft::$app->images->supportsWebP)
        {
            $serverSupport = true;
        }
        // Check if image
        if($image->kind != 'image')
        {
            return null;
        }
        $imgParams = $params != null ? $params : array();
        $imgParams['format'] = 'webp';
        
        // If already WebP image and browser does not support
        if($image->extension == 'webp' && $browserSupport == false)
        {
            // Fallback to PNG incase of transparency
            $imgParams['format'] = 'png';
        } 
        
        // Check params
        if(isset($params))
        {
            if($browserSupport && $serverSupport && $image->extension != 'svg')
            {
                return $image->getUrl($imgParams);
            }
            return $image->getUrl($params);
        }
        else
        {
            if($browserSupport && $serverSupport && $image->extension != 'svg')
            {
                return $image->getUrl($imgParams);
            }
            return $image->getUrl();
        }
        return null;
    }
}

?>