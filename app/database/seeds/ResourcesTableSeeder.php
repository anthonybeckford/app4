<?php

class ResourcesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'kitty_1',
                'image' => 'kitty_1.jpg'
            ],
            [
                'name' => 'kitty_2',
                'image' => 'kitty_2.jpg'
            ]
        ];

        foreach ($data as $row) {
            Resource::create($row);
        }


    }

}