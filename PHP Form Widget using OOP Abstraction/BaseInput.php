<?php

abstract class BaseInput extends HtmlElement
{
    public string $name;
    public string $label;
    public string $value;

    public function __construct($name, $label = '', $value = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }
    public function render(): string
    {
        return sprintf('<div>
                    <label>%s</label> <br>
                    %s
                </div>', $this->label, $this->renderInput());
    }
    abstract public function renderInput(): string;
}
