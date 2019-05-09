<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 02.05.19
 * Time: 2:35
 */

namespace WebPageGenerator\HTMLTag;

class Tag
{
    protected $name, $content, $id, $class, $data, $attributes;

    public function __construct($name, $content = '', $id = '', $class = '', $data = array())
    {
        $this->valid('name',$name);
        $this->valid('content',$content);
        $this->valid('id',$id);
        $this->valid('class',$class);
        $this->valid('data',$data);
        $this->name = $name;
        $this->content = $content;
        $this->id = $id;
        $this->class = $class;
        $this->data = $data;
    }

    public function setContent($content, $append = false)
    {
        $this->valid('content', $content);

        if($append) {
            $this->content .= $content;
        }
        else {
            $this->content = $content;
        }

        return $this;
    }

    public function appendContent($content)
    {
        return $this->setContent($content, true);
    }

    public function setData($data = '', $append = false)
    {
        $this->valid('data',$data);

        if(is_array($data)) {
            $data = $this->dataAttributesFromArray($data);
        }
        if(is_array($this->data)){
            $this->data = $this->dataAttributesFromArray($this->data);
        }
        if(is_object($data)) {
            $data = $this->dataAttributesFromClass($data);
        }
        if(is_object($data)){
            $this->data = $this->dataAttributesFromClass($this->data);
        }

        if($append) {
            $this->data .= ' ' . $data;
        }
        else {
            $this->data = ' ' . $data;
        }

        return $this;
    }

    public function setId($id)
    {
        $this->valid('id',$id);

        $this->id = $id;
        return $this;
    }

    public function setClass($class = '', $append = false)
    {
        $this->valid('class', $class);

        if(is_array($class)) {
            $class = implode(' ', $class);
        }
        if (is_array($this->class)) {
            $this->class = implode(' ', $this->class) . ' ';
        }

        if($append) {
            $this->class .= ' ' . $class;
        }
        else {
            $this->class = ' ' . $class;
        }

        return $this;
    }

    public function setAttributes(Array $attributes)
    {
        $this->attributes = $this->attributesFromArray($attributes);

        return $this;
    }


    public function appendClass($class = '')
    {
        return $this->setClass($class,true);
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
        $tag = "<{$tag}>$this->content</{$this->name}>";
        return $tag;
    }
    
    private function attributesFromArray($array, $prefix='', $suffix='')
    {
        $string = '';
        reset($array);
        for ($i = sizeof($array); $i > 0; $i--) {
            $key = key($array);
            $value = current($array);
            if (!is_string($key) || !is_string($value)) {
                $this->exception("invalid-attr-array");
            }
            if(!empty($prefix)) {
                $key = ($prefix == substr($key, 0, strlen($prefix))) ? substr($key, strlen($prefix)) . '-' : $key;
            }
            if(!empty($suffix)) {
                $key = ($suffix == substr($key, -1, strlen($suffx))) ? '-' . substr($key, -strlen($suffix)) : $key;
            }
            $key = $prefix .  $key . $suffix;
            $string .= "{$key}=\"{$value}\" ";
            next($array);
        }
        return $string;
    }

    private function dataAttributesFromArray($array)
    {
        $string = '';
        reset($array);
        for ($i = sizeof($array); $i > 0; $i--) {
            $key = key($array);
            $value = current($array);
            if (!is_string($key) || !is_string($value)) {
                $this->exception("invalid-data-array");
            }
            $key = ("data-"==substr($key,0,5))?substr($key,4):$key;
            $key = "data-" . $key;
            $string .= "{$key}=\"{$value}\" ";
            next($array);
        }
        return $string;
    }

    private function dataAttributesFromClass($class)
    {
        //TODO:Implement method
        $this->exception("not-implemented");
    }

    private function valid($field,$value){

        $$field = $value;

        if(false && isset($name) && !in_array($htmlTags,$name)) {
            $this->exception('unknown-tag', $this->get_caller());
        }
        if(isset($content) && !is_string($content)) {
            $this->exception('not-string-content', $this->get_caller());
        }
        if(isset($id) && !is_string($id)) {
            $this->exception('not-string-id', $this->get_caller());
        }
        if(isset($id) && strpos($id,' ') !== false) {
            $this->exception('multiple-id', $this->get_caller());
        }
        if(isset($class) && is_object($class) && '\stdClass' != get_class($class)) {
            $this->exception('not-std-class-class',$this->get_caller());
        }
        if(isset($data) && is_object($data) && '\stdClass' != get_class($data)) {
            $this->exception('not-std-class-data', $this->get_caller());
        }

    }

    private function exception($type,$function=null)
    {
        if($function == null) {
            $function = $this->get_caller();
        }

        switch ($type) {
            case "unknown-tag":
                $message = "Unknown tag";
                break;
            case 'not-string-content':
                $message = "Content should be a string.";
                break;
            case 'not-string-id':
                $message = "Id should be string.";
                break;
            case 'multiple-id':
                $message = "Multiple id for tag not allowed.";
                break;
            case "not-std-class-class":
                $message = "Invalid class attribute field. \stdClass required.";
                break;
            case "not-std-class-data":
                $message = "Invalid data attribute field. \stdClass required.";
                break;
            case "invalid-data-array":
                $message = "Invalid data array. Associative array required.";
                break;
            case 'not-implemented':
                $message = "Method " . $function . " not implemented yet";
                break;
            default:
                $message = "Udescribed exception type " . $type;
                break;
        }

        throw new \Exception(__CLASS__ . ':' . $function . ':' . $message);
    }

    protected function get_caller()
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        return $backtrace[2]["function"];
    }

}