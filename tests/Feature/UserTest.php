<?php

use App\Enums\UserStatus;
use App\Models\User;

test('a new user is inactive by default', function () {
    $user = User::factory()->create();

    expect($user->status)->ray()->toBe(UserStatus::Inactive);
});

test('a new user can be created with active status', function () {
    $user = User::factory()->create([
        'status' => UserStatus::Active,
    ]);

    expect($user->status)->ray()->toBe(UserStatus::Active);
});

test('we can filter user by their status', function () {
    User::factory()->create([
        'status' => UserStatus::Active,
    ]);

    User::factory()->create([
        'status' => UserStatus::Inactive,
    ]);

    $activeUsers = User::where('status', UserStatus::Active)->get();
    $inactiveUsers = User::where('status', UserStatus::Inactive)->get();

    expect($activeUsers->count())->toBe(1);
    expect($inactiveUsers->count())->toBe(1);
});

test('it can create user with status in string', function () {
    User::factory()->create([
        'status' => 'active',
    ]);

    User::factory()->create([
        'status' => 'inactive',
    ]);

    $activeUsers = User::where('status', UserStatus::Active)->get();
    $inactiveUsers = User::where('status', 'inactive')->get();

    expect($activeUsers->count())->toBe(1);
    expect($inactiveUsers->count())->toBe(1);
});

test('getUsersWithStatus works with string', function () {
    User::factory()->create([
        'status' => 'active',
    ]);

    User::factory()->create([
        'status' => 'inactive',
    ]);

    $activeUsers = User::getUsersWithStatus(UserStatus::from('active'));
    $inactiveUsers = User::getUsersWithStatus(UserStatus::from('inactive'));

    expect($activeUsers->count())->toBe(1);
    expect($inactiveUsers->count())->toBe(1);
});
