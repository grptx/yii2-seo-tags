<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 21/11/17
 * Time: 17.07
 */

namespace grptx\SEO;

use yii\base\Component;

class SeoTag extends Component
{

    private $twitter;
    /** @var $facebook Facebook */
    private $facebook;
    private $site;

    public function init()
    {
        parent::init();
        $this->facebook = new Facebook();
    }

    public function set($metas = [])
    {
        foreach ($metas as $section => $values) {

            switch($section) {
                case 'facebook':
                    $this->facebook->mergeMetas($values);
                    break;
                case 'twitter':
                    break;
                case 'site':
                    break;
            }

        }
    }

    public function render(){
        $this->facebook->render();
    }

    public function setAndRender($metas){
        $this->set($metas);
        $this->render();
    }
}