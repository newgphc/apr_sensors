<?php

$factory->define(App\Menu::class, function (Faker\Generator $faker) {
    $name = $faker->name;
    $menus = App\Menu::all();
    return [
        'name' => $name,
        'url' => str_slug($name),
        'icon_class' => str_slug($name),
        'parent' => (count($menus) > 0) ? $faker->randomElement($menus->pluck('id')->toArray()) : 0,
        'order' => 0
    ];
});
