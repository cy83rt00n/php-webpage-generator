<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 09.05.19
 * Time: 17:59
 */

namespace WebPageGenerator\HTMLTag;

class Meta extends Tag
{
    protected $key, $content;

    public function __construct($name, $content)
    {
        parent::__construct('meta', '','','','');
        $attributes = array();
        $attributes["name"] = $name;
        $attributes["content"] = $content;
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