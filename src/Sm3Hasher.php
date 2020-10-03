<?php

namespace Wuwx\LaravelHashingSm3;

use Illuminate\Contracts\Hashing\Hasher;

class Sm3Hasher implements Hasher
{

    public function info($hashedValue)
    {
        return password_get_info($hashedValue);
    }

    public function make($value, array $options = [])
    {
        $hash = sm3($value);
        return $hash;
    }

    public function check($value, $hashedValue, array $options = [])
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }
        return $hashedValue === sm3($value);
    }

    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }
}