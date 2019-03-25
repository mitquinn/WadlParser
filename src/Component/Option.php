<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/4/19
 * Time: 11:03 AM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;

/**
 * Class Option
 * @package Mitquinn\Wadl\Component
 */
class Option
{

    /** @var string $value */
    public $value;

    /**
     * Option constructor.
     * @param SimpleXMLElement $option
     */
    public function __construct(SimpleXMLElement $option)
    {
        if(isset($option['value'])) {
            $this->setValue($option['value']);
        }
    }

    /**
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Option
     */
    public function setValue(string $value): Option
    {
        $this->value = $value;
        return $this;
    }

}