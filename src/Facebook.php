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

class Facebook extends AbstractSeo
{
	public $metas = [
		'og:locale'=>'',
		'og:type'=>'',
		'og:title'=>'',
	];

    public function render()
    {
	    Yii::$app->view->on(View::EVENT_BEGIN_PAGE, function(){
			foreach ($this->metas as $key=>$value) {
				Yii::$app->controller->view->registerMetaTag(['property'=>$key,'content'=>$value],$key);
			}
	    });
    }
}