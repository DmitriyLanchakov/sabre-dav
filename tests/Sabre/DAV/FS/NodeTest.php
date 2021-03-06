<?php

namespace Sabre\DAV\FS;

/**
 * This is a test for the Node class. We're actually using the File class to
 * test it, as it doesn't override it and we can construct it as it's
 * non-abstract.
 */
class NodeTest extends \PHPUnit_Framework_TestCase {

    function testConstruct() {

        $node = new File(__FILE__);
        $this->assertEquals('NodeTest.php', $node->getName());

    }

    function testConstructOverrideName() {

        $node = new File(__FILE__, 'foo.txt');
        $this->assertEquals('foo.txt', $node->getName());

    }

    /**
     * @expectedException \Sabre\DAV\Exception\Forbidden
     */
    function testOverrideNameSetName() {

        $node = new File(__FILE__, 'foo.txt');
        $node->setName('foo2.txt');

    }
}
