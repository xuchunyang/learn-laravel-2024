<?php

use App\Enums\Status;

test('status active is active', function () {
    expect(Status::Active)
        ->toBe(Status::Active);
});

test('status active is green', function () {
    expect(Status::Active->color())
        ->toBe('green');
});
