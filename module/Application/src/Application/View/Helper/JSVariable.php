<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class JSVariable extends AbstractHelper
{
    public function __invoke($name, $value)
    {
        return "<script>$name = '$value';</script>";
    }
}