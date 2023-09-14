<?php

use Kazemmdev\Tests\Snapshot\TestCase;

uses(TestCase::class)->in(__DIR__);

expect()->extend('toBeOne', extend: function () {
    return $this->toBe(1);
});
