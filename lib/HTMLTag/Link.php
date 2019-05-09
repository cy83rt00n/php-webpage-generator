<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 09.05.19
 * Time: 17:53
 */

namespace WebPageGenerator\HTMLTag;

class Link extends Tag
{
    protected $rel, $href;

    public function __construct($rel, $href)
    {
        parent::__construct('link', '','','','');
        $attributes = array();
        $attributes["rel"] = $rel;
        $attributes["href"] = $href;
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