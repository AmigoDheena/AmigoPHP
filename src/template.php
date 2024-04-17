<?php

class AmigoPHP
{
    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render($view)
    {
        ob_start();
        extract($this->data);
        $content = file_get_contents($view);
        $content = $this->parseBladeSyntax($content);
        eval('?>' . $content);
        return ob_get_clean();
    }

    private function parseBladeSyntax($content)
    {
        $content = preg_replace_callback('/{{\s*(.*?)\s*}}/', function ($matches) {
            return '<?php echo htmlspecialchars(' . $matches[1] . ', ENT_QUOTES); ?>';
        }, $content);
        return $content;
    }
}
