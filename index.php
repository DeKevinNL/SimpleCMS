<?php

require './Simple/Bootstrap.php';

$Route = CMS::$Router->Load($_SERVER['REQUEST_URI']);

$Name = substr($Route['Page'], 0, -4);

CMS::$Template = new Template($Route['Package']);

CMS::$Template->Title = $Name;

echo CMS::$Template->Output($Route['Page']);
