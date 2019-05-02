<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 02.05.19
 * Time: 2:35
 */

namespace WebPageGenerator;

class HTMLTag
{
    public $name, $content, $id, $class, $data;

    public function __construct($name, $content='', $id='', $class='', $data=array())
    {
        $this->name = $name;
        $this->content =$content;
        $this->id = $id;
        $this->class = $class;
        $this->data = $data;
    }

    public function __toString()
    {
        $tag = '';
        $tag .= "{$this->name} ";

        if(is_array($this->id)) $this->id = array_shift($this->id);
        $tag .= (!empty($this->id))?"id=\"{$this->id}\" ":" ";

        if(is_array($this->class)) $this->class = implode(' ', $this->class);
        $tag .= (!empty($this->class))?"class=\"{$this->class}\" ":" ";

        if(is_array($this->data) && !empty($this->data)) {
            reset($this->data);
            for($i=sizeof($this->data);$i>0;$i--) {
                $key = key($this->data);
                $value = current($this->data);
                if(!is_string($key) || !is_string($value)) { next($this->data); continue;}
                if(empty($key) || empty($value))  { next($this->data); continue;}
                $tag .= "data-{$key}=\"{$value}\"";
            }
        }
        $tag = "<{$tag}>$this->content</{$this->name}>";
        return $tag;
    }
}