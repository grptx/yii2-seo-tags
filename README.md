# yii2-seo-tags
[![Latest Stable Version](https://poser.pugx.org/grptx/yii2-seo-tags/v/stable)](https://packagist.org/packages/grptx/yii2-seo-tags)
[![Total Downloads](https://poser.pugx.org/grptx/yii2-seo-tags/downloads)](https://packagist.org/packages/grptx/yii2-seo-tags)
[![Latest Unstable Version](https://poser.pugx.org/grptx/yii2-seo-tags/v/unstable)](https://packagist.org/packages/grptx/yii2-seo-tags)
[![License](https://poser.pugx.org/grptx/yii2-seo-tags/license)](https://packagist.org/packages/grptx/yii2-seo-tags)

## Installation

Preferred way to install is through [Composer](https://getcomposer.org): 
```shell
php composer.phar require grptx/yii2-seo-tags:~1.0
```
Or, you may add

```php
"grptx/yii2-seo-tags": "~1.0"
```

to the require section of your `composer.json` file and execute `php composer.phar update`.

## Configuration

```php
...
'components' => [
    'seotag' => [
        'class' => 'grptx\SEO\SeoTag',
        // you can add some global tag here (optional)
        'metas'=>[
            'twitter'=>[
                'twitter:creator'=>'@grptx'
                // ...
            ]
            // ...
        ]
    ]
...
]
```

## Usage

```php
/** @var \grptx\SEO\SeoTag $seotag */
$seotag = Yii::$app->seotag;
$seotag->setAndRender([
   'facebook' => [
           'og:title' => '<open graph title>'
        // ...
   ],
   'twitter' => [
        // ...
   ],
   'site' => [
        // ...
   ]   
]);
````

## Available Tags
### Facebook Open Graph
* og:locale           
* og:type             
* og:title            
* og:description      
* og:url              
* og:site_name        
* og:updated_time     
* og:image            
* og:image:secure_url 
* og:image:width      
* og:image:height
* og:image:alt
* fb:app_id     

### Twitter Card
* twitter:card    
* twitter:creator
* twitter:site  
* twitter:title                      
* twitter:description                
* twitter:image                      
* twitter:image:alt                  
* twitter:player                     
* twitter:player:stream              
* twitter:player:stream:content_type 
* twitter:player:width               
* twitter:player:height              
* twitter:app:id:iphone              
* twitter:app:id:ipad                
* twitter:app:id:googleplay          
* twitter:app:url:iphone             
* twitter:app:url:ipad               
* twitter:app:country                
* twitter:app:url:googleplay         

### Site
* description