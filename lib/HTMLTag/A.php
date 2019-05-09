<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 02.05.19
 * Time: 2:44
 */

namespace WebPageGenerator\HTMLTag;

class A extends Tag
{
    public $href, $target;

    public function __construct($href, string $target='', string $content='', string $id = '', string $class = '', array $data = array())
    {
        parent::__construct('a', $content, $id, $class, $data);
        $attributes = array();
        $attributes['href'] = $href;
        if(!empty($target)) $attributes['target'] = $target;
        $this->setAttributes($attributes);
    }

}