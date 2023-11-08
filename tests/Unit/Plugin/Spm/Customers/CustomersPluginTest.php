<?php

namespace Piedpiper\Tests\Unit\Plugin\Spm\Customers\Extension;

use Piedpiper\Plugin\Spm\Customers\Extension\Customers;
use Joomla\CMS\Application\CMSWebApplicationInterface;
use Joomla\Event\Dispatcher;
use Joomla\Event\Event;

class CustomersPluginTest extends \PHPUnit\Framework\TestCase
{
    public function testFixCasing()
    {
        $testString = 'HELLO@PIEDPIPER';
        $testData = ['email' => $testString];
        $app = $this->createStub(CMSWebApplicationInterface::class);
        $event = new Event('test');

        $event->setArgument('data', $testData);

        $dispatcher = new Dispatcher();
        $plugin = new Customers($dispatcher);
        $plugin->setApplication($app);

        $plugin->fixCasing($event);

		$resultData = $event->getArgument('data');

        $this->assertEquals(strtolower($testData['email']), $resultData['email']);
    }
}

