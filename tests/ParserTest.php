<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/3/19
 * Time: 12:45 AM
 */

use Mitquinn\Wadl\Component\Grammar;
use Mitquinn\Wadl\Component\Included;
use Mitquinn\Wadl\Parser;
use PHPUnit\Framework\TestCase;
use Mitquinn\Wadl\Component\Method;
use Mitquinn\Wadl\Component\Resource;
use Mitquinn\Wadl\Component\Collections\ResourceCollection;

//ini_set('xdebug.var_display_max_depth', '10');
//ini_set('xdebug.var_display_max_children', '256');
//ini_set('xdebug.var_display_max_data', '1024');

/**
 * Class ParserTest
 */
class ParserTest extends TestCase
{

    /**
     * Test a single initialization.
     */
    public function testInitializeSingle()
    {
        $parser = new Parser(__DIR__.'/wadls/storage/application.wadl');
        static::assertInstanceOf(Parser::class, $parser);
    }


    /**
     * @provider parserProvider
     * @return array
     */
    public function parserProvider()
    {
        return [
            [new Parser(__DIR__.'/wadls/cupi/application.wadl')],
            [new Parser(__DIR__.'/wadls/amazon/application.wadl')],
            [new Parser(__DIR__.'/wadls/storage/application.wadl')],
            [new Parser(__DIR__.'/wadls/bookstore/application.wadl')],
            [new Parser(__DIR__.'/wadls/w3/application.wadl')],
        ];
    }

    /**
     * @dataProvider parserProvider
     * @param Parser $parser
     */
    public function testInitialize(Parser $parser)
    {
        static::assertInstanceOf(Parser::class, $parser);
    }


    /**
     * @dataProvider parserProvider
     * Test getAllResources
     */
    public function testGetAllResources(Parser $parser)
    {
        $resourceCollection = $parser->getResources();
        static::assertInstanceOf(ResourceCollection::class, $resourceCollection);
        /** @var Resource $resource */
        foreach ($resourceCollection->getResources() as $resource) {
            static::assertInstanceOf(Resource::class, $resource);
        }
    }

    /**
     * @dataProvider parserProvider
     * Test getResourcesByMethod
     * @param Parser $parser
     */
    public function testGetResourcesByMethod(Parser $parser)
    {
        $methodString = 'GET';
        $resourceCollection = $parser->getResourcesByMethod($methodString);
        static::assertInstanceOf(ResourceCollection::class, $resourceCollection);
        $resources = $resourceCollection->getResources();

        /** @var Resource $resource */
        foreach ($resources as $resource) {
            /** @var Method[] $methods */
            $methods = $resource->getMethodCollection()->getMethods();
            foreach ($methods as $method) {
                static::assertTrue(in_array($methodString, [$method->getId(), $method->getName()]));
            }
        }
    }


    /**
     * @dataProvider cupiProvider
     * @param Parser $parser
     */
    public function testGetResourceByPath(Parser $parser)
    {
        $path = 'callhandlertemplates/{objectid}/templatemenuentries/{TouchtoneKey}';
        $resourceCollection = $parser->getResourcesByPath($path);
        static::assertInstanceOf(ResourceCollection::class, $resourceCollection);
        /** @var Resource $resource */
        $resource = $resourceCollection->getResources()->first();
        static::assertEquals($path, $resource->getResourcePath());
    }


    /**
     * @dataProvider parserProvider
     * @param Parser $parser
     */
    public function testGetGrammar(Parser $parser)
    {
        $grammar = $parser->getApplication()->getGrammar();
        if($grammar) {
            static::assertInstanceOf(Grammar::class, $grammar);
            $includeCollection = $grammar->getIncludedCollection()->getIncludes();
            /** @var Included $included */
            foreach ($includeCollection as $included) {
                static::assertInstanceOf(Included::class, $included);
                static::assertIsString($included->getHref());
            }
        } else {
            static::assertNull($grammar);
        }
    }

    /**
     * @return array
     */
    public function w3Provider()
    {
        return [
            [new Parser(__DIR__.'/wadls/w3/application.wadl')]
        ];
    }

    /**
     * @return array
     */
    public function cupiProvider()
    {
        return [
            [new Parser(__DIR__.'/wadls/cupi/application.wadl')]
        ];
    }

}