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
		'twitter:card'    => '',
		'twitter:creator' => '',
		'twitter:site'    => '',

	];

	public function render() {
		if ( empty( $this->metas['og:site_name'] ) ) {
			$this->metas['og:site_name'] = Yii::$app->name;
		}
		if ( empty( $this->metas['og:title'] ) ) {
			$this->metas['og:title'] = Yii::$app->name;
		}
		if ( empty( $this->metas['og:url'] ) ) {
			$this->metas['og:url'] = Yii::$app->request->absoluteUrl;
		}
		if ( empty( $this->metas['og:locale'] ) ) {
			$this->metas['og:locale'] = str_replace( '-', '_', Yii::$app->language );
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