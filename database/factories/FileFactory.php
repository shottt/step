<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Infra\EloquentModel\File::class, function (Faker $faker) {

    // ファイル実体の保存
    $fileRealPath = UploadedFile::fake()->create('tempfilename.pdf', 10)->store('private/files');

    return [
        'original_name' => $faker->unique()->realText(10),
        'content_type' => 'application/pdf',
        'storage_type' => 'local',
        'path' => $fileRealPath
    ];
});
