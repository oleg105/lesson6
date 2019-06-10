<?php


abstract class FormElement
{
    /**
     * @var string
     */

    private $name;

    private $label;

    public function __construct(string $name, string $label)
    {
        $this->name = $name;
        $this->label = $label;
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

    abstract public function render(): string ;

}