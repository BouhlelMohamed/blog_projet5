<?php

class View
{
    public function renderPage(string $path,array $params = NULL)
    {
        if($params != NULL)
        {
            extract($params);
        }
        ob_start();
        require($path);
        return ob_get_clean();
    }
    public function render(string $path,array $params = NULL )
    {
        $content = $this->renderPage($path . ".view.php", $params);
        ob_start();
        require "base.view.php";
        return ob_get_clean();
    }
}