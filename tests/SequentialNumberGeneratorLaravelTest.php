<?php

namespace Spielfigur\LaravelSequentialNumberGenerator\Tests;

use Orchestra\Testbench\TestCase;
use Spielfigur\LaravelSequentialNumberGenerator\Facades\SequentialNumberGeneratorFacade;
use Spielfigur\LaravelSequentialNumberGenerator\SequentialNumberGenerator;
use Spielfigur\LaravelSequentialNumberGenerator\SequentialNumberGeneratorServiceProvider;

class SequentialNumberGeneratorTestLaravel extends TestCase
{
    protected function getPackageProviders($app)
    {
        return array(
            SequentialNumberGeneratorServiceProvider::class,
        );
    }

    protected function getPackageAliases($app)
    {
        return array(
            'SequentialNumberGeneratorFacade' => SequentialNumberGeneratorFacade::class,
        );
    }

    /** @test */
    public function it_returns_the_ascending_following_sequential_number_with_default_config_values()
    {
        $value = 'ISSUE-CUSTOMERID-0012345';
        $nextNumber = SequentialNumberGeneratorFacade::generateNumber($value);

        $this->assertSame('ISSUE-CUSTOMERID-0012346', $nextNumber);
    }
}
