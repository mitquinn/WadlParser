<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 11:23 PM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasParamCollection;

/**
 * Class Request
 * @package Mitquinn\Wadl\Component
 */
class Request
{
    use HasParamCollection;

    /**
     * Request constructor.
     * @param SimpleXMLElement $request
     */
    public function __construct(SimpleXMLElement $request)
    {
        if($request->param->count()) {
            $params = $request->param;
            foreach ($params as $param) {
                $this->getParamCollection()->addParam(new Param($param));
            }
        }
    }
}