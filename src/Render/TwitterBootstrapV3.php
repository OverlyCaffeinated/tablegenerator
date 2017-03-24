<?php
/**
 * Created by PhpStorm.
 * User: joshp
 * Date: 10/13/16
 * Time: 8:35 PM
 */

namespace Table\Render;


use Table\Cell;

class TwitterBootstrapV3 implements Renderer
{
    public static function render($table, $options) {
        $classes = 'table';
        foreach(['table-striped', 'table-bordered', 'table-hover', 'table-condensed'] as $element) {
            $classes .= isset($options[$element]) && $options[$element] == true ? ' ' . $element : '';
        }

        $html = '<table class="'.$classes.'">';

        foreach($table as $row) {
            $html .= '<tr>';
            foreach($row->getRowContents() as $cell) {
                $value = $cell->getValue();
                $style = '';
                switch ($cell->getType()) {
                    case Cell::CURRENCY:
                        $value = '$' . number_format($value, 2);
                    case Cell::NUMERIC:
                    case Cell::STRING:
                        $tag = 'td';
                        break;

                    case Cell::HEADER:
                        $tag = 'th';
                        $style .= 'font-weight: bold;';
                        break;

                    default:
                        $tag = 'td';
                        break;
                }

                $html .= '<'.$tag.' style="'.$style.'">' . $value . '</'.$tag.'>';
            }
            $html .= '</tr>';
        }

        return $html;
    }
}