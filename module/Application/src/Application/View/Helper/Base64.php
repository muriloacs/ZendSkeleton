<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Base64 extends AbstractHelper
{
    public function __invoke($pictureUrl)
    {   
        $helper = new IsExternalLink();
        $external = $helper->__invoke($pictureUrl);
        
        if(!$external){
            // Current module
            $module = strstr(substr($pictureUrl, 1), '/', true);
            // Picture file full path
            $picturePath = ROOT_PATH . "/module/$module/public" . $pictureUrl;
            // Base64 encode
            $base64 = base64_encode(file_get_contents($picturePath));
        }
        else{
            $base64 = base64_encode(file_get_contents($pictureUrl));
        }
        // Picture file extension
        $extension = pathinfo($pictureUrl, PATHINFO_EXTENSION);
        // Base64 data
        $data = "data:image/$extension;base64,";
        
        return $data . $base64;
    }
}