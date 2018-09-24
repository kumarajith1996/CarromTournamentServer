<?php
use Migrations\AbstractSeed;

/**
 * Stages seed.
 */
class TeamsSeed extends AbstractSeed
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
                'tournament_id' => '1',
                'name' => 'Zoomers',
                'bid_points' => 100,
                'played' => 2,
                'won' => 1,
                'points' => 10,
                'loss' => 1,
                'league' => 4,
            ],
            [
                'id' => '2',
                'tournament_id' => '1',
                'name' => 'SDE6',
                'bid_points' => 100,
                'played' => 2,
                'won' => 1,
                'points' => 10,
                'loss' => 1,
                'league' => 4,
            ],
        ];

        $table = $this->table('teams');
        $table->insert($data)->save();
    }
}
