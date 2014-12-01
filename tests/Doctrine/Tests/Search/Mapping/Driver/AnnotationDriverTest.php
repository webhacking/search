<?php
namespace Doctrine\Tests\Search\Mapping\Driver;

use Doctrine\Search\Mapping\Driver\AnnotationDriver;
use Doctrine\Search\Mapping\ClassMetadata;
use Doctrine\Common\Annotations\AnnotationReader;

/**
 * Test class for AnnotationDriver.
 * Generated by PHPUnit on 2011-12-13 at 08:34:04.
 */
class AnnotationDriverTest extends AbstractDriverTest
{
    /**
     * @var \Doctrine\Search\Mapping\Driver\AnnotationDriver
     */
    private $annotationDriver;

    /**
     * @var \Doctrine\Common\Annotations\AnnotationReader|\PHPUnit_Framework_MockObject_MockObject
     */
    private $reader;

    protected function setUp()
    {
        $this->reader = new AnnotationReader();

        $this->annotationDriver = new AnnotationDriver($this->reader);
    }

    public function testLoadMetadataForClass()
    {
        $className = 'Doctrine\\Tests\\Models\\Comments\\User';
        $metadata = new ClassMetadata($className);

        $this->annotationDriver->loadMetadataForClass($className, $metadata);

        $expected = $this->loadExpectedMetadataFor($className);
        
        $this->assertEquals($expected, $metadata);
    }
}
