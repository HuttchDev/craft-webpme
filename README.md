# WebP Me for Craft CMS

Simple function that returns a WebP formatted image url if the visitors browser and the server supports WebP, if not then it will fallback to a standard image url.

+ If both the server and visitors browser supports WebP, the passed image will be converted to WebP unless the passed image is a SVG.
+ If the visitors browser does not support WebP then the image will not be converted and will maintain its current format.
+ If the passed image is already a WebP image but the visitors browser does not support WebP then the image will be converted to a PNG (incase of transparency).

## Usage

WebP Twig Function
```
Example:
{{ WebP(entry.image.one(), {'mode': 'crop', 'height': '600', 'width': '800'}) }}
```
Optional Function Name Variations (for your preference)
```
WebP()
webp()
WebPMe()
webpMe()
webpme()
```
IsWebPSupported Twig Function
```
IsWebPSupported
```
Return true or false depending on server and visitor browser support

