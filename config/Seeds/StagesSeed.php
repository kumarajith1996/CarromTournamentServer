<?php
use Migrations\AbstractSeed;

/**
 * Stages seed.
 */
class StagesSeed extends AbstractSeed
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
                'name' => 'playoffs',
            ],
            [
                'id' => '2',
                'name' => 'semifinals',
            ],
            [
                'id' => '3',
                'name' => 'finals',
            ],
        ];

        $table = $this->table('stages');
        $table->insert($data)->save();
    }
}
