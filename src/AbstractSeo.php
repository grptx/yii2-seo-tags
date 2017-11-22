<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 21/11/17
 * Time: 19:41
 */

namespace grptx\SEO;


abstract class AbstractSeo
{
    protected $metas = [];

    public function mergeMetas($metas){
    	$this->metas = array_merge($this->metas,$metas);
    }

    public function render(){}
}