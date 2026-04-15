<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Str;


class SlugGeneratorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $title = 'What is a "slug" in Laravel?';
        $expected = 'what-is-a-slug-in-laravel';
        
        $slug = Str::slugCustom($title);

        $this->assertEquals($expected, $slug);
    }
}
