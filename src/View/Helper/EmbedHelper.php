<?php
namespace App\View\Helper;

use Cake\View\Helper;

class EmbedHelper extends Helper
{
    public $helpers = ['Url'];

    public function responsive($embed)
    {
        $html = '';

        preg_match('/height="([^"]+)"/', $embed, $match);
        $height = $match[1];

        preg_match('/width="([^"]+)"/', $embed, $match);
        $width = $match[1];

        if( $width == '100%' )
        {
            $html = $embed;
        }else{

            $pattern = "/height=\"[0-9]*\"/";
            $embed = preg_replace($pattern, 'height="100%"', $embed);
            $pattern = "/width=\"[0-9]*\"/";
            $embed = preg_replace($pattern, 'width="100%" style="position:absolute; top:0; left:0;" ', $embed);

            $ratio = $height / $width;
            $ratio = floor( $ratio * 100 ) . '%';

            $html = '<div style="position:relative; padding-bottom:'.$ratio.'; height:0; overflow:auto; -webkit-overflow-scrolling:touch;" >'.$embed.'</div>';
        }

        return $html;
    }
}
