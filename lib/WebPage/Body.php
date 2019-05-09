<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 02.05.19
 * Time: 2:42
 */

namespace WebPageGenerator\WebPage;
use WebPageGenerator\HTMLTag\Tag;

class Body extends Tag
{

    public function __construct( string $content = '')
    {
        parent::__construct("body", $content, '','','');
    }

}