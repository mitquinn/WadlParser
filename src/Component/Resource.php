<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 11:22 PM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasParamCollection;
use Mitquinn\Wadl\Traits\HasMethodCollection;
use Mitquinn\Wadl\Traits\HasResourceCollection;

/**
 * Class Resource
 * @package Mitquinn\Wadl\Component
 */
class Resource
{

    use HasParamCollection, HasMethodCollection, HasResourceCollection;

    /** @var string $base This is the base from the root level Resources. */
    public $base;

    /** @var string|null $parentPath This is an optional field passed in by the parent Resource. */
    public $parentPath;

    /** @var string $path This is the path of the current Resource. */
    public $path;



    /**
     * Resource constructor.
     * @param SimpleXMLElement $resource
     * @param string $resourcesBase
     * @param string|null $parentPath
     */
    public function __construct(SimpleXMLElement $resource, string $resourcesBase, string $parentPath = null)
    {
        //Set the path.
        if(isset($resource['path'])) {
            $this->setPath($resource['path']);
        }

        //Setting the base.
        $this->setBase($resourcesBase);

        //Setting the parent path.
        if(!is_null($parentPath)) {
            $this->setParentPath($parentPath);
        }

        //Handle the Path
        if($resource->param->count()) {
            $params = $resource->param;
            foreach ($params as $param) {
                $this->getParamCollection()->addParam(new Param($param));
            }
        }

        //Handle methods
        if($resource->method->count()) {
            $methods = $resource->method;
            foreach ($methods as $method) {
                $this->getMethodCollection()->addMethod(new Method($method));
            }
        }

        //Handle resources
        if($resource->resource->count()) {
            $resources = $resource->resource;
            foreach ($resources as $childResource) {
                $this->getResourceCollection()->addResource(
                    new Resource($childResource, $this->getBase(), $this->getPath())
                );
            }
        }
    }

    /*** Public functions ***/


    public function getResourcePath(): string
    {
        if(is_null($this->getParentPath())) {
            return $this->getPath();
        }
        return $this->getParentPath().'/'.$this->getPath();
    }

    /**
     * @return string
     */
    public function getFullPath(): string
    {
        if(is_null($this->getParentPath())) {
            return $this->getBase().$this->getResourcePath();
        }
        return $this->getBase().$this->getResourcePath();
    }

    /**
     * @return bool
     */
    public function hasResources(): bool
    {
        return $this->getResourceCollection()->getResources()->isNotEmpty();
    }

    /*** Getters and Setter ***/

    /**
     * @return string
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Resource
     */
    public function setPath(string $path): \Mitquinn\Wadl\Component\Resource
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getBase(): string
    {
        return $this->base;
    }

    /**
     * @param string $base
     * @return Resource
     */
    public function setBase(string $base): \Mitquinn\Wadl\Component\Resource
    {
        $this->base = $base;
        return $this;
    }

    /**
     * @return string
     */
    public function getParentPath(): ?string
    {
        return $this->parentPath;
    }

    /**
     * @param string $parentPath
     * @return Resource
     */
    public function setParentPath(string $parentPath): \Mitquinn\Wadl\Component\Resource
    {
        $this->parentPath = $parentPath;
        return $this;
    }

}