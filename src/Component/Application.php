<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 11:19 PM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasXmlnsCollection;
use Mitquinn\Wadl\Traits\HasDocCollection;

/**
 * Class Application
 * @package Mitquinn\Wadl
 */
class Application
{
    use HasDocCollection, HasXmlnsCollection;

    /** @var Grammar $grammars */
    public $grammar;

    //TODO: I think WADL files could possibly have multiple resources elements but I haven't been able to find an example.
    /** @var Resources $resources */
    public $resources;

    /**
     * Application constructor.
     * @param SimpleXMLElement $application
     */
    public function __construct(SimpleXMLElement $application)
    {

        //Handle the creation of the xmlns.
        $namespaces = $application->getNamespaces();
        foreach ($namespaces as $prefix => $uri) {
            $this->getXmlnsCollection()->addXmlns(new Xmlns($prefix, $uri));
        }

        //Handle the grammar element if it exists.
        if($application->grammars->count()) {
            $this->setGrammar(new Grammar($application->grammars));
        }

        //Handle the doc elements if they exist.
        if($application->doc->count()) {
            $docs = $application->doc;
            foreach ($docs as $doc) {
                $this->getDocCollection()->addDoc(new Doc($doc));
            }
        }

        //Handle the Resources
        if($application->resources->count()) {
            $resources = $application->resources;
            $this->setResources(new Resources($resources));
        }
    }

    /*** Getters and Setters ***/

    /**
     * @return Resources
     */
    public function getResources(): Resources
    {
        return $this->resources;
    }

    /**
     * @param Resources $resources
     * @return Application
     */
    public function setResources(Resources $resources): Application
    {
        $this->resources = $resources;
        return $this;
    }

    /**
     * @return Grammar
     */
    public function getGrammar(): ?Grammar
    {
        return $this->grammar;
    }

    /**
     * @param Grammar $grammar
     * @return Application
     */
    public function setGrammar(Grammar $grammar): Application
    {
        $this->grammar = $grammar;
        return $this;
    }

}