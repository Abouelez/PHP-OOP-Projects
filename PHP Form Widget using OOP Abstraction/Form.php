<?php

require_once 'HtmlElement.php';
class Form extends HtmlElement
{
    protected array $elements;
    public $action;
    public $method;
    public function __construct($action = '', $method = 'get')
    {
        $this->method = $method;
        $this->action = $action;
    }
    public function addElement(HtmlElement $el)
    {
        $this->elements[] = $el;
    }
    public function render(): string
    {
        $content = implode(PHP_EOL, array_map(fn ($el) => $el->render(), $this->elements));
        return sprintf("<form action = '%s' method = '%s'>%s</form>", $this->action, $this->method, $content);
    }
}
