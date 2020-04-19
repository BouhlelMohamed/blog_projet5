<?php


class Page404Controller
{
    public function page404NotFound()
    {
        $view = new View;
        return $view->render("Views/page404NotFound");
    }
}