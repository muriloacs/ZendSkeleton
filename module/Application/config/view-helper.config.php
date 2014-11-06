<?php
/**
 * View Helpers configuration.
 */

namespace Application;

return array(
    'invokables' => array(
        'JSVariable' => 'Application\View\Helper\JSVariable',
        'currency' => 'Application\View\Helper\Currency',
        'isExternalLink' => 'Application\View\Helper\IsExternalLink',
        'thumbnail' => 'Application\View\Helper\Thumbnail',
        'base64' => 'Application\View\Helper\Base64'
    )
);
