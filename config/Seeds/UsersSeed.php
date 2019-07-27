<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
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
                'username' => 'admin',
                'email' => 'admin@redditscheduler.com',
                'password' => '$2y$10$5bxP/vfdv7pS9FpOQl8SgOoEOFdW/1ZYMoE5DgXuBRKp1TaA6coDm',
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'created' => '2019-07-18 07:37:38',
                'modified' => '2019-07-18 07:37:38',
                'admin' => '1',
                'sa' => '1',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
