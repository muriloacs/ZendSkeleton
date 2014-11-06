<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Currency extends AbstractHelper
{
    public function __invoke($value, $currency = true)
    {
        $value = number_format($value, 2, ',', '.');
        return $currency ? 'R$ ' . $value : $value; 
    }
}