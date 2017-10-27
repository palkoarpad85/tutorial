<?php
use Migrations\AbstractMigration;

class CreateRolesSeed extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
      $faker =\Faker\Factory::create();
      $populator = new Faker\ORM\CakePHP\Populator($faker);

      $populator->addEntity('roles_users',15,[
        'role_id'=>function() use($faker){
          return rand(1,5);
        },
        'user_id'=>function() use($faker){
          return rand(1,15);
        }
      ]);
    }
}
