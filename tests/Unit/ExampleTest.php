<?php

namespace Tests\Unit;

use App\Http\Controllers\DB;
use App\Models\News;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertIsArray(DB::getAll());
        $this->assertArrayHasKey(2,News::getNewsByCategory(1));
    }
}
