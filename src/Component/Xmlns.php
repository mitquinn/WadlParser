<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/4/19
 * Time: 1:40 AM
 */

namespace Mitquinn\Wadl\Component;

/**
 * Class Xmlns
 * @package Mitquinn\Wadl\Component
 */
class Xmlns
{

    /** @var string $prefix */
    public $prefix;

    /** @var string $uri */
    public $uri;

    /**
     * Xmlns constructor.
     * @param string $prefix
     * @param string $uri
     */
    public function __construct(string $prefix, string $uri)
    {
        $this->setPrefix($prefix);
        $this->setUri($uri);
    }


    /*** Getters and Setters ***/

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return Xmlns
     */
    public function setPrefix(string $prefix): Xmlns
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return Xmlns
     */
    public function setUri(string $uri): Xmlns
    {
        $this->uri = $uri;
        return $this;
    }
}