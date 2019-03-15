<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/4/19
 * Time: 1:31 PM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;

/**
 * Class Included
 * @package Mitquinn\Wadl\Component
 */
class Included
{

    /** @var string $href */
    public $href;

    /**
     * Included constructor.
     * @param SimpleXMLElement $included
     */
    public function __construct(SimpleXMLElement $included)
    {
        //Handle the href.
        if(isset($included['href'])) {
            $this->setHref($included['href']);
        }
    }

    /*** Getters and Setters ***/

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param string $href
     * @return Included
     */
    public function setHref(string $href): Included
    {
        $this->href = $href;
        return $this;
    }
}