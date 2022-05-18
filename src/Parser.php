<?php

namespace Biboletin\Template;

class Parser
{
    public function __construct()
    {
        //
    }

    public function parse($file = '')
    {
        $content = file_get_contents($file);

        $code = $this->imports($content);
        $code = $this->echos($content);
        $code = $this->comments($content);
        $code = $this->compile($content);

        return $code;
    }

    private function imports($text = '')
    {
        preg_match_all('/{{ ?(extends|include) ?\'?(.*?)\'? ?}}/i', $text, $matches, PREG_SET_ORDER);
        foreach ($matches as $value) {
            $text = str_replace($value[0], $this->imports($value[2]), $text);
        }
        $code = preg_replace('/{{ ?(extends|include) ?\'?(.*?)\'? ?}}/i', '', $text);
        return $code;
    }

    private function echos($text = '')
    {
        return preg_replace('~\{{\s*(.+?)\s*\}}~is', '<?php echo $1 ?>', $text);
    }
    private function comments($text = '')
    {
        return preg_replace('~\{{!! \s*(.+?)\s*\ !!}}~is', '<!-- $1 -->?>', $text);
    }
    private function compile($text = '')
    {
        return preg_replace('~\{{\s*(.+?)\s*\}}~is', '<?php $1 ?>', $text);
    }
}
