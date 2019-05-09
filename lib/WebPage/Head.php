<?php
/**
 * Created by PhpStorm.
 * User: cy83rt00n
 * Date: 02.05.19
 * Time: 2:42
 */

namespace WebPageGenerator\WebPage;
use WebPageGenerator\HTMLTag\Tag;

class Head extends Tag
{
    public $title, $meta, $script, $link;

    public function __construct( string $content = '')
    {
        parent::__construct("head", $content, '','','');
    }
}