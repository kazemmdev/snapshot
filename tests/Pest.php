<?php

use Kazemmdev\Tests\Snapshot\TestCase;
use Illuminate\Support\Facades\Http;

uses(TestCase::class)->in(__DIR__);

expect()->extend('toBeOne', extend: function () {
    return $this->toBe(1);
});
