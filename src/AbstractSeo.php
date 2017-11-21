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
    public function set($metas)
    {
        foreach ($metas as $property => $content) {
            if (property_exists($this, $property)) {
                $this->$property = $content;
            }
        }
    }

    public function render(){}
}