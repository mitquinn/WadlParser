<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 11:24 AM
 */

namespace Mitquinn\Wadl\Component\Collections;

use Mitquinn\Wadl\Component\Resource;
use Tightenco\Collect\Support\Collection;

/**
 * Class ResourceCollection
 * @package Mitquinn\Wadl\Component\Collections
 */
class ResourceCollection
{
    /** @var Collection $resources */
    protected $resources = null;

    /**
     * @param Resource $resource
     * @return ResourceCollection
     */
    public function addResource(Resource $resource): ResourceCollection
    {
        $this->getResources()->add($resource);
        return $this;
    }


    public function filterByResourcePath(string $path): ResourceCollection
    {
        $resources = $this->getResources()->filter(function($resource) use ($path) {
            /** @var Resource $resource */
            if($resource->getResourcePath()  == $path) {
                return true;
            }
            return false;
        });
        $this->setResources($resources);
        return $this;
    }



    /**
     * @return Collection
     */
    public function getResources(): Collection
    {
        if(is_null($this->resources)) {
            $this->setResources(new Collection());
        }
        return $this->resources;
    }

    /**
     * @param Collection $resources
     * @return ResourceCollection
     */
    protected function setResources(Collection $resources): ResourceCollection
    {
        $this->resources = $resources;
        return $this;
    }

}