<?php

namespace Biboletin\Template;

use Biboletin\Template\Parser;

class Cache
{
    private $directory;
    private $parser;

    public function __construct()
    {
        $this->directory = __DIR__ . '/../cache';
        $this->parser = new Parser();
    }

    public function clear()
    {
        foreach (glob($this->directory . '/*.*') as $file) {
            unlink($file);
        }
        return true;
    }

    public function cached($fileName = '', $file = '')
    {
        $cached = $this->directory . '/' . md5($fileName);
        if ((!file_exists($cached)) || (filemtime($cached) < filemtime($file))) {
            $parsed = $this->parser->parse($file);
            file_put_contents($cached, $parsed);
        }

        return $cached;
    }
}
