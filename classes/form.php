<?php


class form
{
    /**
     * @var FormElement[]
     */
    private $elements;

    private $method;

    private $isSubmitted = false;

    public function __construct(string $method = 'post')
    {
        $availableMethods = ['post','get'];
        $method = strtolower($method);

        if (!in_array($method, $availableMethods)) {
            throw new InvalidArgumentException('Method'. $method . 'is not available.');
        }

        $this->method = $method;
    }

    public function add(FormElement $element) {

        $this->elements[$element->getName()] = $element;
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function render()
    {
        $html = sprintf('<form method=%s>', $this->method);
        //$html = '<form>';

        foreach ($this->elements as $element) {
            $html .= $element->render() . '<br>';
        }
        $html .= '</form>';
        return $html;
    }

    public function handleRequest()
    {
        $data = $this->method == 'post' ? $_POST : $_GET;

        foreach ($this->elements as $element) {
            if(isset($data[$element->getName()])) {
                $this->isSubmitted = true;
                $element->setValue($data[$element->getName()]);

            }
        }
        foreach ($this->elements as $element) {
            if ($element->getError()) {
                $this->isSubmitted = false;
                break;
            }
        }
    }

    public function getValue($name) {
        return $this->elements[$name]->getValue();
    }


    public function isSubmitted(): bool
    {
        return $this->isSubmitted;
    }


}