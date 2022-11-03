<?php

namespace Wuwx\LaravelHashingSm3\Test;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class Sm3HasherTest extends TestCase
{
    /** @test */
    public function testSm3Driver()
    {
        $this->assertEquals(Hash::driver('sm3')->make("0"), "06d47b6f2f121e85160d1d8072e58843de1eed164ed526c3b56b22c2b47324a0");
        $this->assertEquals(Hash::driver('sm3')->make("123456"), "207cf410532f92a47dee245ce9b11ff71f578ebd763eb3bbea44ebd043d018fb");
        $this->assertEquals(Hash::driver('sm3')->make("admin"), "dc1fd00e3eeeb940ff46f457bf97d66ba7fcc36e0b20802383de142860e76ae6");
    }

    public function testDefaultDriver()
    {
        Config::set('hashing.driver', 'sm3');
        $this->assertEquals(Hash::make("0"), "06d47b6f2f121e85160d1d8072e58843de1eed164ed526c3b56b22c2b47324a0");
        $this->assertEquals(Hash::make("123456"), "207cf410532f92a47dee245ce9b11ff71f578ebd763eb3bbea44ebd043d018fb");
        $this->assertEquals(Hash::make("admin"), "dc1fd00e3eeeb940ff46f457bf97d66ba7fcc36e0b20802383de142860e76ae6");
    }
}