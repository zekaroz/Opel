<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomepageTests extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_homepage_is_up()
    {
          $this->visit('/')
               ->see('PCQAR')
               ->see('Quem Somos')
               ->see('Serviços')
               ->see('Localização')
               ->see('Peças recicladas')
               ->see('Veículos usados')
               ->see('Veículos para Peças');
    }

    public function test_quem_somos_is_up(){

         //visit main landing page
         $this->visit('/quem_somos')
              ->see('PCQAR')
              ->see('Quem Somos')
              ->see('Serviços')
              ->see('Localização');
      }

      public function test_servicos_is_up(){

           //visit main landing page
           $this->visit('/servicos')
                ->see('PCQAR')
                ->see('Quem Somos')
                ->see('Serviços')
                ->see('Localização')
                ->dontSee('Peças recicladas')
                ->dontSee('Veículos usados')
                ->dontSee('Veículos para Peças');
        }

          public function test_contactos_is_up(){
               //visit main landing page
               $this->visit('/contactos')
                    ->see('PCQAR')
                    ->see('Quem Somos')
                    ->see('Serviços')
                    ->see('Localização')
                    ->dontSee('Peças recicladas')
                    ->dontSee('Veículos usados')
                    ->dontSee('Veículos para Peças');
            }
            public function test_pesquisa_pecas_is_up(){
              /*Lista de pesquisa de peças*/
              $this->visit('/pecas')
                   ->see('PCQAR')
                   ->see('Quem Somos')
                   ->see('Serviços')
                   ->see('Localização')
                   ->see('Peças recicladas')
                   ->see('Veículos usados')
                   ->see('Veículos para Peças');
            }
            public function test_pesquisa_veiculos_usados_is_up(){
              /*Lista de pesquisa de Automóveis usados*/
               $this->visit('/carros')
                    ->see('PCQAR')
                    ->see('Quem Somos')
                    ->see('Serviços')
                    ->see('Localização')
                    ->see('Peças recicladas')
                    ->see('Veículos usados')
                    ->see('Veículos para Peças');
            }
            public function test_carros_para_pecas_is_up(){
              /*Lista de pesquisa de Automóveis para peças*/
              $this->visit('/carros_para_pecas')
                   ->see('PCQAR')
                   ->see('Quem Somos')
                   ->see('Serviços')
                   ->see('Localização')
                   ->see('Peças recicladas')
                   ->see('Veículos usados')
                   ->see('Veículos para Peças');
            }

}
