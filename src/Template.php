<?php

namespace Biboletin\Template;

use Biboletin\Template\Cache;
use Exception;

class Template
{
    private $directory;
    private $cache;
    private $extension;
    private $content;

    public function __construct()
    {
        $this->directory = __DIR__ . '/../views';
        $this->extension = '.php';
        $this->cache = new Cache();
    }

    public function load($name = '')
    {
        $clean = trim(strip_tags($name));
        if ($clean === '') {
            throw new Exception('Emty view name!');
        }
        $file = $this->directory . '/' . $clean . $this->extension;

        if (!file_exists($file)) {
            throw new Exception('View ' . $clean . ' not found!');
        }
        if (($resource = fopen($file, 'r')) === false) {
            throw new Exception('Cant open ' . $file);
        }
        if (!is_resource($resource)) {
            throw new Exception('Not resource!');
        }

        $cache = $this->cache->cached($clean, $file);
        fclose($resource);
        $this->content = $cache;
        // return $cache;
    }

    public function content()
    {
// error_log($this->content);
        ob_start();
        include $this->content;
        ob_flush();
    }

    public function clearCache(): bool
    {
        return (bool) $this->cache->clear();
    }
}
