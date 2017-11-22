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
	public $metas = [];

	/** @var  $_twitter Twitter */
    private $_twitter;
    /** @var $_facebook Facebook */
	private $_facebook;
	/** @var $_site Site */
	private $_site;

    public function init()
    {
        parent::init();
        $this->_facebook = new Facebook();
        if(isset($this->metas['facebook'])) {
        	$this->_facebook->mergeMetas($this->metas['facebook']);
        }
        $this->_twitter = new Twitter();
	    if(isset($this->metas['twitter'])) {
		    $this->_twitter->mergeMetas($this->metas['twitter']);
	    }
	    $this->_site = new Site();
	    if(isset($this->metas['site'])) {
		    $this->_site->mergeMetas($this->metas['site']);
	    }
    }

    public function set($metas = [])
    {
        foreach ($metas as $section => $values) {

            switch($section) {
                case 'facebook':
                    $this->_facebook->mergeMetas($values);
                    break;
                case 'twitter':
	                $this->_twitter->mergeMetas($values);
                    break;
                case 'site':
	                $this->_site->mergeMetas($values);
                    break;
            }

        }
    }

    public function render(){
        $this->_facebook->render();
	    $this->_twitter->render();
	    $this->_site->render();
    }

    public function setAndRender($metas){
        $this->set($metas);
        $this->render();
    }
}