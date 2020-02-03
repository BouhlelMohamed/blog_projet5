<?php


class Page404
{

    public function page404NotFound()
    {

        $view = new View;
        return $view->render("Views/page404NotFound");
    }
}