<?php

use App\Models\Notebook;
use Database\Factories\NotebookFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\patchJson;
use function Pest\Laravel\postJson;

uses(TestCase::class, RefreshDatabase::class);


test('GET /api/v1/notebook 200', function () {
    $request = Notebook::factory()->count(5)->create();

    getJson('/api/v1/notebook', $request->toArray())
        ->assertStatus(200)
        ->assertJsonCount(5, 'data');
});

test('GET /api/v1/notebook/{id} 200', function () {
    $request = Notebook::factory()->create();

    getJson("/api/v1/notebook/{$request->id}")
        ->assertStatus(200);
});

test('GET /api/v1/notebook/{id} 404', function () {
    $undefinedId = 999999;

    getJson("/api/v1/notebook/{$undefinedId}")->assertStatus(404);
});

test('POST /api/v1/notebook 201', function () {
    $request = NotebookFactory::new()->make()->toArray();

    postJson('/api/v1/notebook', $request)
        ->assertStatus(201);

    assertDatabaseHas((new Notebook())->getTable(), [
        'full_name' => $request['full_name'],
        'company' => $request['company'],
        'phone' => $request['phone'],
        'email' => $request['email'],
        'birth_date' => $request['birth_date'],
        'photo' => $request['photo'],
    ]);
});

test('POST /api/v1/notebook 422', function () {
    $request = Notebook::factory()->make();
    unset($request['full_name']);

    $this->postJson('/api/v1/notebook', $request->toArray())
        ->assertStatus(422);
});

test('DELETE /api/v1/notebook/{id} 200', function () {
    $request = Notebook::factory()->create();

    deleteJson("/api/v1/notebook/{$request->id}")
        ->assertStatus(200);

    assertModelMissing($request);
});

test('DELETE /api/v1/notebook/{id} 404', function () {
    $undefinedId = 999999;
    deleteJson("/api/v1/notebook/{$undefinedId}")
        ->assertStatus(404);
});

test('PATCH /api/v1/notebook/{id} 200', function () {
    $post = Notebook::factory()->create();
    $request = [
        'full_name' => 'Updated full name',
        'company' => 'Updated company',
    ];

    patchJson("/api/v1/notebook/{$post->id}", $request)
        ->assertStatus(200);

    assertDatabaseHas((new Notebook())->getTable(), [
        'full_name' => $request['full_name'],
        'company' => $request['company'],
        'phone' => $post['phone'],
        'email' => $post['email'],
        'birth_date' => $post['birth_date'],
        'photo' => $post['photo'],
    ]);
});

test('PATCH /api/v1/notebook/{id} 422', function () {
    $post = Notebook::factory()->create();
    $request = [
        'full_name' => 555,
        'company' => 'Updated company',
    ];


    patchJson("/api/v1/notebook/{$post->id}", $request)
        ->assertStatus(422);
});

test('PATCH /api/v1/notebook/{id} 404', function () {
    $request = [
        'full_name' => 'Updated full name',
        'company' => 'Updated company',
    ];
    $undefinedId = 999999;

    patchJson("/api/v1/notebook/{$undefinedId}", $request)
        ->assertStatus(404);
});



