<?php

namespace Spielfigur\LaravelSequentialNumberGenerator\Tests;

use PHPUnit\Framework\TestCase;
use Spielfigur\LaravelSequentialNumberGenerator\SequentialNumberGeneratorFactory;

class SequentialNumberGeneratorTest extends TestCase
{
    /** @test */
    public function it_returns_the_ascending_following_sequential_number_first_test()
    {
        $value = 'COMPANYNAME/2019-12-02/001';
        $generator = new SequentialNumberGeneratorFactory();
        $nextNumber = $generator->generateNumber($value, '/', 2, 3);

        $this->assertSame('COMPANYNAME/2019-12-02/002', $nextNumber);
    }

    /** @test */
    public function it_returns_the_ascending_following_sequential_number_second_test()
    {
        $value = '001-COMPANYNAME';
        $generator = new SequentialNumberGeneratorFactory();
        $nextNumber = $generator->generateNumber($value, '-', 0, 3);

        $this->assertSame('002-COMPANYNAME', $nextNumber);
    }

    /** @test */
    public function it_starts_again_from_the_beginning()
    {
        $value = 'COMPANYNAME/2019-12-02/999';
        $generator = new SequentialNumberGeneratorFactory();
        $nextNumber = $generator->generateNumber($value, '/', 2, 3);

        $this->assertSame('COMPANYNAME/2019-12-02/000', $nextNumber);
    }

    /** @test */
    public function it_returns_an_error_if_string_does_not_contain_the_number_on_the_given_place()
    {
        $value = 'COMPANYNAME/CUSTOMERID/001/2019-12-19';
        $generator = new SequentialNumberGeneratorFactory();
        $nextNumber = $generator->generateNumber($value, '/', 1, 3);

        $this->assertSame('number not found? must be an integer!', $nextNumber);
    }
}
