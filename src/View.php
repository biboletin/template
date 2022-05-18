<?php

namespace Biboletin\Template;

use Biboletin\Template\Template;

class View
{
    private $data;
    private $template;

    public function __construct()
    {
        $this->template = new Template();
    }
    public function template($name = '')
    {
        $this->template->load($name, $this->data);
    }

    public function data($data = [])
    {
        $this->data = $data;
    }

    public function render()
    {
        return $this->template->content();
    }

    public function clearCache()
    {
        return $this->template->clearCache();
    }
}
