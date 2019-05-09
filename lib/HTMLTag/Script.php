<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 09.05.19
 * Time: 17:42
 */

namespace WebPageGenerator\HTMLTag;

class Script extends Tag
{
    protected $type, $src, $async, $defer;

    public function __construct(string $type, string $src, bool $async = false, bool $defer = false, string $content = '')
    {
        $attributes = array();
        if(!empty($content)) {
            parent::__construct('script', $content, '', '', '');
        }
        else {
            parent::__construct('script', '', '', '', '');
            $attributes["src"] = $src;
        }
        if($async) {
            $attributes["async"] = "async";
        }
        if($defer) {
            $attributes["defer"] = "defer";
        }
        parent::setAttributes($attributes);
    }

    public function setAttributes($attributes=null){
        $this->exception('deprecated-method');
    }


    private function exception($type,$function=null)
    {
        if($function == null) {
            $function = $this->get_caller();
        }

        switch ($type) {
            case "deprecated-method":
                $message = "Method " . $function . "() deprecated.";
                break;
            default:
                $message = "Udescribed exception type " . $type;
                break;
        }

        throw new \Exception(__CLASS__ . ':' . $function . ':' . $message);
    }


}