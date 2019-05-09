<?php

namespace WebPageGenerator;

use WebPageGenerator\HTMLTag\A;
use WebPageGenerator\HTMLTag\Input;
use WebPageGenerator\HTMLTag\Label;
use WebPageGenerator\HTMLTag\Link;
use WebPageGenerator\HTMLTag\Meta;
use WebPageGenerator\HTMLTag\Script;
use WebPageGenerator\HTMLTag\Tag;
use WebPageGenerator\WebPage\WebPage;


function Tag($name, $content='', $id='', $class='', $data=array())
{
    return new Tag($name, $content, $id, $class, $data);
}

function A($href, $target, $content = '', $id = '', $class = '', $data = array())
{
    return new A($href, $target, $content, $id, $class, $data);
}

function Input($type, $name, $value, $content = '', $id = '', $class = '', $data = array())
{
    return new Input($type, $name, $value, $content, $id, $class, $data);
}

function Label($for, $content = '', $id = '', $class = '', $data = array())
{
    return new Label($for, $content, $id, $class, $data);
}

function Link($rel, $href)
{
    return new Link($rel, $href);
}

function Meta($name, $content)
{
    return new Meta($name, $content);
}

function Script($type, $src = '', $content = '', $defer = true, $async = false)
{
    return new Script($type, $src, $async, $defer, $content);
}

function WebPage($doctype)
{
    return new WebPage($doctype);
}