<?php



class TxtInput extends BaseInput
{
    public function renderInput(): string
    {
        return sprintf('<input type = text name = %s value = %s><br>', $this->name, $this->value);
    }
}
