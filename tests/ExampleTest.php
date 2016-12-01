<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_page_is_up()
    {
        $this->visit('/')
             ->see('PCQAR')
             ->see('Quem Somos')
             ->see('Serviços')
             ->see('Localização');
    }
}
