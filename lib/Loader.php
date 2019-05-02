<?php

namespace WebPageGenerator;

use WebPageGenerator\HTMLTag\Tag;

function HTMLTag($name, $content='', $id='', $class='', $data=array())
{
    return new Tag($name, $content='', $id='', $class='', $data=array());
}