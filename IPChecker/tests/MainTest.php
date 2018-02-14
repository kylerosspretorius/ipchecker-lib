<?php
/**
 * Created by PhpStorm.
 * User: kylepretorius
 * Date: 29/01/2018
 * Time: 10:58
 */

namespace KylePretorius\IPChecker\Tests;

use Mcm\IPChecker\IPChecker;
use PHPUnit\Framework\TestCase;


/**
 * Class MainTest
 *
 * @package KylePretorius\IPChecker\Tests
 */
class MainTest extends TestCase
{
    /**
     * Test that the method detect exists
     */
    public function testMethodExists()
    {
        $client = new IPChecker();
        $result = method_exists($client, "check");
        $this->assertTrue($result);
    }


}