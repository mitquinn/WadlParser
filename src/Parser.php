<?php

namespace Mitquinn\Wadl;

use SimpleXMLElement;
use Mitquinn\Wadl\Component\Resource;
use Mitquinn\Wadl\Component\Application;
use Mitquinn\Wadl\Component\Collections\ResourceCollection;

/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 12:32 AM
 */

/**
 * Class Parser
 * @package Mitquinn\Wadl
 */
class Parser
{

    /** @var string $wadlFilePath */
    protected $wadlFilePath;

    /** @var SimpleXMLElement $wadl*/
    protected $wadl;

    /** @var Application $application */
    protected $application;

    /**
     * Parser constructor.
     * @param string $wadlFilePath Path to the WADL file.
     */
    public function __construct(string $wadlFilePath)
    {
        //Set the wadl file path.
        $this->setWadlFilePath($wadlFilePath);

        //Load the wadl file.
        $this->loadWaldFile();

        //Parse the wadl files building the tree.
        $this->parseWadl();
    }


    /*** Public functions ***/

    /**
     * TODO: I feel like i should be caching this.
     * This function returns a single resource collection containing all of the nested resources.
     * @return ResourceCollection
     */
    public function getResources(): ResourceCollection
    {
        $resourceCollection = $this->getApplication()->getResources()->getResourceCollection();
        return $this->recursiveResource($resourceCollection);
    }


    /**
     * This returns a single ResourceCollection containing all resources with the passed method.
     * @param string $method
     * @return ResourceCollection
     */
    public function getResourcesByMethod(string $method): ResourceCollection
    {
        $return = new ResourceCollection();
        $resources = $this->getApplication()->getResources()->getResourceCollection()->getResources();

        //Searching for uppercase values.
        $method = ucwords($method);

        /** @var Resource $resource */
        foreach ($resources as $resource) {
            $resource->getMethodCollection()->filterByMethodType($method);
            if($resource->getMethodCollection()->getMethods()->isNotEmpty()) {
                $return->addResource($resource);
            }
        }
        return $return;
    }

    /**
     * @param string $path
     * @return ResourceCollection
     */
    public function getResourcesByPath(string $path): ResourceCollection
    {
        return  $this->getResources()->filterByResourcePath($path);
    }

    /*** Protected functions ***/

    /**
     * Todo: this seems overly complicated.
     * @param ResourceCollection $resourceCollection
     * @return ResourceCollection
     */
    protected function recursiveResource(ResourceCollection $resourceCollection): ResourceCollection
    {
        $return = new ResourceCollection();
        /** @var Resource[] $resources */
        $resources = $resourceCollection->getResources();
        foreach ($resources as $resource) {
            $return->getResources()->add($resource);
            if($resource->hasResources()) {
                $nestedResources = $this->recursiveResource($resource->getResourceCollection());
                foreach ($nestedResources->getResources() as $nestedResource) {
                    $return->getResources()->add($nestedResource);
                }
            }
        }
        return $return;
    }





    /*** Protect Functions ***/

    /**
     * Loads the wadl file.
     */
    protected function loadWaldFile()
    {
        $wadl = simplexml_load_file($this->getWadlFilePath());
        $this->setWadl($wadl);
    }

    /**
     * Parses the loaded wadl file.
     */
    protected function parseWadl()
    {
        $wadl = $this->getWadl();
        $application = new Application($wadl);
        $this->setApplication($application);
    }


    /** Getters and Setters */

    /**
     * @return string
     */
    public function getWadlFilePath(): string
    {
        return $this->wadlFilePath;
    }

    /**
     * @param string $wadlFilePath
     * @return Parser
     */
    protected function setWadlFilePath(string $wadlFilePath): Parser
    {
        $this->wadlFilePath = $wadlFilePath;
        return $this;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getWadl(): SimpleXMLElement
    {
        return $this->wadl;
    }

    /**
     * @param SimpleXMLElement $wadl
     * @return Parser
     */
    protected function setWadl(SimpleXMLElement $wadl): Parser
    {
        $this->wadl = $wadl;
        return $this;
    }

    /**
     * @return Application
     */
    public function getApplication(): Application
    {
        return $this->application;
    }

    /**
     * @param Application $application
     * @return Parser
     */
    protected function setApplication(Application $application): Parser
    {
        $this->application = $application;
        return $this;
    }

}