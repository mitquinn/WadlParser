<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 11:21 PM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasResourceCollection;

/**
 * Class Resources
 * @package Mitquinn\Wadl\Component
 */
class Resources
{
    use HasResourceCollection;

    /** @var string $base */
    public $base;

    /**
     * Resources constructor.
     * @param SimpleXMLElement $resources
     */
    public function __construct(SimpleXMLElement $resources)
    {
        //Set the base.
        if(isset($resources['base'])) {
            $this->setBase($resources['base']);
        }

        if($resources->resource->count()) {
            $resources = $resources->resource;
            foreach ($resources as $resource) {
                $this->getResourceCollection()->addResource(new Resource($resource, $this->getBase()));
            }
        }
    }

    /*** Getters and Setters ***/

    /**
     * @return string
     */
    public function getBase(): ?string
    {
        return $this->base;
    }

    /**
     * @param string $base
     * @return Resources
     */
    public function setBase(string $base): Resources
    {
        $this->base = $base;
        return $this;
    }

}