<?php
use Migrations\AbstractSeed;

/**
 * Stages seed.
 */
class TournamentsSeed extends AbstractSeed
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
                'name' => 'Blaze1',
                'start_date' => '',
                'end_date' => '',
            ],
            [
                'id' => '2',
                'name' => 'Blaze2',
                'start_date' => '',
                'end_date' => '',
            ],
        ];

        $table = $this->table('tournaments');
        $table->insert($data)->save();
    }
}
