# WebP Me for Craft CMS

Simple function that returns a WebP formatted image url if the visitors browser and the server supports WebP, if not then it will fallback to a standard image url.

+ If both the server and visitors browser supports WebP, the passed image will be converted to WebP unless the passed image is a SVG.
+ If the visitors browser does not support WebP then the image will not be converted and will maintain its current format.
+ If the passed image is already a WebP image but the visitors browser does not support WebP then the image will be converted to a PNG (incase of transparency).

## Usage

### WebP Twig Function
```
Example:
<img src="{{ WebP(entry.image.one(), {'mode': 'crop', 'height': '600', 'width': '800'}) }}"/>
```
WebP(image asset, craft image transform params)

### Using Preset Image Transforms
```
Example:
<img src="{{ WebP(entry.image.one(), {transform: 'headerImage'}) }}
```

### Image Transform Params
Any craft support image parameters can be used [See Docs](https://craftcms.com/docs/4.x/image-transforms.html#possible-values)

Possible Params:
```
{
  transform: 'headerImage', // (optional) pass to use preset image transform created in the CMS admin panel, optionally add other params in combination with this to override preset settings
  height: 300, // set height
  width: 800, // set width
  mode: 'crop', // set transform mode (crop, fit, letterbox, stretch)
  quality: 80, // ovveride quality settings
  position: 'top-center' // override default center position when no focal point (supported when using 'crop' or 'letterbox')
}
```

#### Optional Function Name Variations (for your preference)
```
WebP()
webp()
WebPMe()
webpMe()
webpme()
```
## IsWebPSupported Twig Function
Useful for cache keys, to gnerate a cache version for webp support and one without when using {% cache %}

e.g. {% cache using key 'header-' ~ IsWebPSupported %} [View Docs](https://craftcms.com/docs/4.x/reference/twig/tags.html#cache)

```
IsWebPSupported
```
Return true or false depending on server and visitor browser support

