<?php
use Migrations\AbstractSeed;

/**
 * Levels seed.
 */
class LevelsSeed extends AbstractSeed
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
                'name' => 'admin',
            ],
            [
                'id' => '2',
                'name' => 'bidder',
            ],
            [
                'id' => '3',
                'name' => 'refree',
            ],
            [
                'id' => '4',
                'name' => 'player',
            ],
        ];

        $table = $this->table('levels');
        $table->insert($data)->save();
    }
}
