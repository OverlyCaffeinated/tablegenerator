<?php

namespace OverlyCaffeinated\Table\Render\Excel;

class Style {

    private $tag;

    public function __construct(&$style, $id, $options)
    {
        $this->tag = $style->addChild('ss:Style');
        $this->tag->addAttribute('xmlns:ss:ID', $id);
        if(isset($options['number_format'])) {
            $number_format = $this->tag->addChild('ss:NumberFormat');
            $number_format->addAttribute('xmlns:ss:Format', $options['number_format']);
        }

        if(isset($options['font'])) {
            $font = $this->tag->addChild('ss:Font');
            if(isset($options['font']['bold']) && $options['font']['bold'] === true) {
                $font->addAttribute('xmlns:ss:Bold', 1);
            }

            if(isset($options['font']['alignment'])) {
                $align = $this->tag->addChild('ss:Alignment');

                if(isset($options['font']['alignment']['horizontal'])) {
                    $align->addAttribute('xmlns:ss:Horizontal', $options['font']['alignment']['horizontal']);
                }
            }
        }

        if(isset($options['interior'])) {
            $interior = $this->tag->addChild('ss:Interior');

            if(isset($options['interior']['color'])) {
                $interior->addAttribute('xmlns:ss:Color', $options['interior']['color']);
            }

            if(isset($options['interior']['pattern'])) {
                $interior->addAttribute('xmlns:ss:Pattern', $options['interior']['pattern']);
            }
        }
    }
}