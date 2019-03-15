<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 11:22 PM
 */

namespace Mitquinn\Wadl\Component;


use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasResponseCollection;

/**
 * Class Method
 * @package Mitquinn\Wadl\Component
 */
class Method
{
    use HasResponseCollection;

    /** @var string $name */
    public $name;

    /** @var string $id */
    public $id;

    /** @var Request $request */
    public $request;

    /** @var string $href */
    public $href;

    /**
     * Method constructor.
     * @param SimpleXMLElement $method
     */
    public function __construct(SimpleXMLElement $method)
    {
        //Handle the name
        if(isset($method['name'])) {
            $this->setName($method['name']);
        }
        //Handle the id
        if(isset($method['id'])) {
            $this->setId($method['id']);
        }

        if(isset($method['href'])) {
            $this->setHref($method['href']);
        }

        //Handle the request
        if($method->request->count()) {
            $request = $method->request;
            $this->setRequest(new Request($request));
        }

        //Handle the response
        if($method->response->count()) {
            $responses = $method->response;
            foreach ($responses as $response) {
                $this->getResponseCollection()->addResponse(new Response($response));
            }
        }

    }

    /*** Getters and Setters ***/

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Method
     */
    public function setName(string $name): Method
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Method
     */
    public function setId(string $id): Method
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     * @return Method
     */
    public function setRequest(Request $request): Method
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return string
     */
    public function getHref(): ?string
    {
        return $this->href;
    }

    /**
     * @param string $href
     * @return Method
     */
    public function setHref(string $href): Method
    {
        $this->href = $href;
        return $this;
    }
}