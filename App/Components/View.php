<?php

namespace App\Components;

use App\Components\Config;

class View
{
    public function render($template_name, array $params = [], $return_string = false, $minify_html = false) {

        $template = VIEW_DIR . "/{$template_name}.php";

        if (!file_exists($template)) {
            throw new \Error("Template file {$template} not exist!");
        }

        global $add_in_head;
        if (isset($add_in_head) && is_array($add_in_head)) {
            extract($add_in_head, EXTR_SKIP);
        }

        global $add_in_foot;
        if (isset($add_in_foot) && is_array($add_in_foot)) {
            extract($add_in_foot, EXTR_SKIP);
        }

        $config = Config::getAll();
        extract(['config' => $config], EXTR_SKIP);

        if (!empty($params['header'])) {
            $params['header'] = array_merge($config['seo']['header_metas'], $params['header']);
        } else {
            $params['header'] = $config['seo']['header_metas'];
        }

        extract($params, EXTR_SKIP);

        ob_start();
        require(VIEW_DIR . "/{$template_name}.php");
        $render_output = ob_get_contents();
        ob_end_clean();

        if ($minify_html) {
            $render_output = $this->minify_html($render_output);
        }

        if ($return_string) {
            return $render_output;
        }

        echo $render_output;
    }

    public function minify_html($buffer) {

        $search = [
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        ];

        $replace = [
            '>',
            '<',
            '\\1',
            ''
        ];

        $buffer = preg_replace($search, $replace, $buffer);

        return $buffer;
    }
}
