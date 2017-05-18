<?php

namespace App\Components\Crystal;

/**
 * Class Crystal
 *
 * Templating Engine for the Maiden Framework
 */
class Crystal
{
    public function __construct()
    {
    }

    public function render($filename, array $data = []) {
        try {
            $file = __DIR__ . '/views/' . $filename . '.php';

            if (!is_readable($file)) {
                throw new \Exception("View $file not found!", 1);
            }

            $content = file_get_contents($file);
            ob_start() && extract($data, EXTR_SKIP);
            eval('?>' . $content);
            $content = ob_get_clean();
            //ob_flush();
            return $content;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}