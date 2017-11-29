<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 21/11/17
 * Time: 19:40
 */

namespace grptx\SEO;


use Yii;
use yii\web\View;

class Facebook extends AbstractSeo {
	public $metas = [
		'og:locale'           => '',
		'og:type'             => '',
		'og:title'            => '',
		'og:description'      => '',
		'og:url'              => '',
		'og:site_name'        => '',
		'og:updated_time'     => '',
		'og:image'            => '',
		'og:image:secure_url' => '',
		'og:image:width'      => '',
		'og:image:height'     => '',
		'og:image:alt'        => '',
		'fb:app_id'           => '',
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
				Yii::$app->controller->view->registerMetaTag( [ 'property' => $key, 'content' => $value ], $key );
			}
		} );
	}
}