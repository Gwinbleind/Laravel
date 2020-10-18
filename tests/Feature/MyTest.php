<?php

namespace Tests\Feature;

use Tests\TestCase;

class MyTest extends TestCase
{
    public function testHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200)->assertSee('Главная страница');
    }

    public function testNews()
    {
        $response = $this->get('/news');
        $response->assertStatus(200)->assertSee('Путин в Африке');
    }
}
