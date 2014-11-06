<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class IsExternalLink extends AbstractHelper
{
    public function __invoke($link)
    {
        return substr($link, 0, 4) == 'http' ? true : false;
    }
}