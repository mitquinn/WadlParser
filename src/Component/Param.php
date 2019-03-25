<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 11:35 PM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasXmlnsCollection;
use Mitquinn\Wadl\Traits\HasOptionCollection;

/**
 * Class Param
 * @package Mitquinn\Wadl\Component
 */
class Param
{
    use HasXmlnsCollection, HasOptionCollection;

    /** @var string $type */
    public $type;

    /** @var string $style */
    public $style;

    /** @var string $name */
    public $name;

    /** @var string $default */
    public $default;

    /** @var string $required */
    public $required;

    /**
     * Param constructor.
     * @param SimpleXMLElement $param
     */
    public function __construct(SimpleXMLElement $param)
    {
        //Handle the type
        if(isset($param['type'])) {
            $this->setType($param['type']);
        }

        //Handle the style
        if(isset($param['style'])) {
            $this->setStyle($param['style']);
        }

        //Handle the name
        if(isset($param['name'])) {
            $this->setName($param['name']);
        }

        //Handle the default
        if(isset($param['default'])) {
            $this->setDefault($param['default']);
        }

        //Handle the required
        if(isset($param['required'])) {
            $this->setRequired($param['required']);
        }

        //Handle xmlns
        $namespaces = $param->getNamespaces();
        foreach ($namespaces as $prefix => $uri) {
            $this->getXmlnsCollection()->addXmlns(new Xmlns($prefix, $uri));
        }

        //Handle options
        if($param->option->count()) {
            $option = $param->option;
            $this->getOptionCollection()->addOption(new Option($option));
        }

    }

    /*** Getters and Setters ***/

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Param
     */
    public function setType(string $type): Param
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getStyle(): ?string
    {
        return $this->style;
    }

    /**
     * @param string $style
     * @return Param
     */
    public function setStyle(string $style): Param
    {
        $this->style = $style;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Param
     */
    public function setName(string $name): Param
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefault(): ?string
    {
        return $this->default;
    }

    /**
     * @param string $default
     * @return Param
     */
    public function setDefault(string $default): Param
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequired(): ?string
    {
        return $this->required;
    }

    /**
     * @param string $required
     * @return Param
     */
    public function setRequired(string $required): Param
    {
        $this->required = $required;
        return $this;
    }

}