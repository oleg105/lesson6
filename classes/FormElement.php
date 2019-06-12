<?php


abstract class FormElement
{

    private $name;

    private $label;

    protected $value;

    protected $required = false;

    protected $error = '';

    public function __construct(string $name, string $label, bool $required = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->required = $required;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
        if (empty($value) && $this->required) {
            $this->error = 'Поле не должно быть пустым.';
        }
    }

    public function getError(): string
    {
        return $this->error;
    }


    abstract public function render(): string ;

}