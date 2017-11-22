<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 22/11/17
 * Time: 10.39
 */

namespace grptx\SEO;


use Yii;
use yii\web\View;

class Site extends AbstractSeo {
	public $metas = [
		'description'    => '',
	];

	public function render() {
		Yii::$app->view->on( View::EVENT_BEGIN_PAGE, function () {
			if(!empty($this->metas['description'])) {
				Yii::$app->controller->view->registerMetaTag( [ 'name' => 'description', 'content' => $this->metas['description'] ], 'description' );
			}
		} );
	}
}