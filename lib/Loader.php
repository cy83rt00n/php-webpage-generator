<?php

namespace WebPageGenerator;

use WebPageGenerator\HTMLTag\Tag;
use WebPageGenerator\WebPage\WebPage;

function HTMLTag($name, $content='', $id='', $class='', $data=array())
{
    return new Tag($name, $content, $id, $class, $data);
}

function WebPage()
{
    return new WebPage();
}