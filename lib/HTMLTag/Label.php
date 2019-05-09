<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 02.05.19
 * Time: 2:47
 */

namespace WebPageGenerator\HTMLTag;

class Label extends Tag
{
    public $for;


    public function __construct($for, string $content = '', string $id = '', string $class = '', array $data = array())
    {
        $attributes = array();
        $attributes['for'] = $for;
        parent::__construct('label', $content, $id, $class, $data);
        $this->setAttributes($attributes);
    }
}
