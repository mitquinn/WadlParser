<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 11:23 PM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasRepresentationCollection;

/**
 * Class Response
 * @package Mitquinn\Wadl\Component
 */
class Response
{
    use HasRepresentationCollection;

    /** @var string $status */
    public $status;

    /**
     * Response constructor.
     * @param SimpleXMLElement $response
     */
    public function __construct(SimpleXMLElement $response)
    {
        //Handle the status
        if(isset($response['status'])) {
            $this->setStatus($response['status']);
        }

        //Handle the representation
        if($response->representation->count()) {
            $representations = $response->representation;
            foreach ($representations as $representation) {
                $this->getRepresentationCollection()->addRepresentation(new Representation($representation));
            }
        }

    }

    /*** Getters and Setters ***/

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Response
     */
    public function setStatus(string $status): Response
    {
        $this->status = $status;
        return $this;
    }

}