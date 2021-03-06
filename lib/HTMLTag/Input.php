<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 02.05.19
 * Time: 2:46
 */

namespace WebPageGenerator\HTMLTag;

class Input extends Tag
{
    public $type, $key, $value;


    public function __construct($type, $name, $value, string $id = '', string $class = '', array $data = array())
    {
        $attributes = array();
        $attributes['type'] = $type;
        $attributes['name'] = $name;
        $attributes['value'] = $value;
        parent::__construct('input', '', $id, $class, $data);
        $this->setAttributes($attributes);
    }

    public function __toString()
    {
        $tag = '';
        $tag .= $this->name;
        $tag .= (!empty($this->id))?' ' . "id=\"{$this->id}\"":'';
        $tag .= (!empty($this->class))?' ' . "class=\"{$this->class}\"":'';
        $tag .= (!empty($this->attributes))?' ' . $this->attributes:'';
        $tag .= (!empty($this->data))?' ' . $this->data:'';
        $tag = trim($tag);
        $tag = "<{$tag}/>";
        return $tag;
    }
}
