<?php
namespace App\View\Helper;

use Cake\View\Helper;

class ImageHelper extends Helper
{
    public $helpers = ['Url'];

    public function image($params, $attributes = null ) {
        $src = $this->thumbSrc( $params );
        $html = '<img src="'. $src .'" ';
        $attributes = ( $attributes )? $attributes : array();
        foreach(  $attributes as $attribute => $value ){
            $html.='  '.$attribute.'="'.$value.'"';
        }
        $html .= ' />';
        return $html;
    }

    public function thumbSrc($params) {
        $start = substr($params['image'],0 , 4);
        $params['image'] = ( $start == 'http' )? $params['image'] : $params['image'];
        return $this->Url->build('/image.php').'?'. http_build_query($params);
    }
}
