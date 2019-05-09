<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 02.05.19
 * Time: 2:41
 */

namespace WebPageGenerator\WebPage;

class WebPage
{
    public $doctype,$html,$head,$body;

    public function __construct($doctype)
    {
        $this->doctype = $doctype;
        $this->head = new Head();
        $this->body = new Body();
    }

    public function __toString()
    {
        $this->html = '';
        $this->html .= "<!DOCTYPE {$this->doctype}>";
        $this->html .= strval($this->head);
        $this->html .= strval($this->body);
        return $this->html;
    }

    public function getPage()
    {
        return $this->__toString();
    }
}