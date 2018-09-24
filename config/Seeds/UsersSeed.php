<?php
use Migrations\AbstractSeed;

/**
 * Stages seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'kumaji',
                'image_url' => 'www.google.com',
                'role' => 'Dev',
                'base_points' => 20,
                'team_id' => 1,
                'bid_value' => 20,
                'status' => 1,
                'level_id' => 4,
                'isPlayer' => 1,
            ],
            [
                'id' => '2',
                'name' => 'shylajhaa',
                'image_url' => 'www.google.com',
                'role' => 'Dev',
                'base_points' => 20,
                'team_id' => 1,
                'bid_value' => 20,
                'status' => 1,
                'level_id' => 4,
                'isPlayer' => 1,
            ],
            [
                'id' => '3',
                'name' => 'thalaivi',
                'image_url' => 'www.google.com',
                'role' => 'BA',
                'base_points' => 20,
                'team_id' => 2,
                'bid_value' => 20,
                'status' => 1,
                'level_id' => 4,
                'isPlayer' => 1,
            ],
            [
                'id' => '4',
                'name' => 'Tarun',
                'image_url' => 'www.google.com',
                'role' => 'BA',
                'base_points' => 20,
                'team_id' => 2,
                'bid_value' => 20,
                'status' => 1,
                'level_id' => 4,
                'isPlayer' => 1,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
