<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 22/11/17
 * Time: 10.25
 */

namespace grptx\SEO;

use Yii;
use yii\web\View;

class Twitter extends AbstractSeo {
	public $metas = [
		'twitter:card'                       => '',
		'twitter:creator'                    => '',
		'twitter:site'                       => '',
		'twitter:title'                      => '',
		'twitter:description'                => '',
		'twitter:image'                      => '',
		'twitter:image:alt'                  => '',
		'twitter:player'                     => '',
		'twitter:player:stream'              => '',
		'twitter:player:stream:content_type' => '',
		'twitter:player:width'               => '',
		'twitter:player:height'              => '',
		'twitter:app:id:iphone'              => '',
		'twitter:app:id:ipad'                => '',
		'twitter:app:id:googleplay'          => '',
		'twitter:app:url:iphone'             => '',
		'twitter:app:url:ipad'               => '',
		'twitter:app:country'                => '',
		'twitter:app:url:googleplay'         => '',

	];

	public function render() {
		if ( empty( $this->metas['twitter:card'] ) ) {
			$this->metas['twitter:card'] = 'site';
		}

		Yii::$app->view->on( View::EVENT_BEGIN_PAGE, function () {
			foreach ( $this->metas as $key => $value ) {
				if ( empty( $value ) ) {
					continue;
				}
				Yii::$app->controller->view->registerMetaTag( [ 'name' => $key, 'content' => $value ], $key );
			}
		} );
	}
}