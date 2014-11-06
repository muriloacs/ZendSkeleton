<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Thumbnail extends AbstractHelper
{
    public function __invoke($pictureURL, $pictureSize, $containerSize)
    {
        $pictureDimensions = explode('x', $pictureSize);
        $pictureWidth = $pictureDimensions[0];
        $pictureHeight = $pictureDimensions[1];
        
        $containerDimensions = explode('x', $containerSize);
        $containerWidth = $containerDimensions[0];
        $containerHeight = $containerDimensions[1];
        
        if($pictureHeight == $pictureWidth){
            $minMeasureContainer = $containerHeight < $containerWidth ? $containerHeight : $containerWidth;
            $finalMeasure = $pictureHeight > $minMeasureContainer ? $minMeasureContainer : $pictureHeight;
            $finalHeight = $finalWidth = $finalMeasure;
        }
        else{
            if($pictureHeight > $pictureWidth){
                $proportion = $pictureHeight/$pictureWidth;
                $finalHeight = $pictureHeight > $containerHeight ? $containerHeight : $pictureHeight;
                $finalWidth = $finalHeight/$proportion;
            }
            else{
                $proportion = $pictureWidth/$pictureHeight;
                $finalWidth = $pictureWidth > $containerWidth ? $containerWidth : $pictureWidth;
                $finalHeight = $finalWidth/$proportion;
            }
        }
        $marginTop = ($containerHeight - $finalHeight)/2;
        
        return "<img src='{$pictureURL}' height='{$finalHeight}' width='{$finalWidth}' style='margin-top:{$marginTop}px' class='img-responsive'>";
    }
}