<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;


class CreateUsersSeed extends AbstractMigration
{

public function up()
{
    $faker =\Faker\Factory::create();
    $populator = new Faker\ORM\CakePHP\Populator($faker);

    $populator->addEntity('Users',50,[
      'first_name'=>function() use($faker){
        return $faker->firstName();
      },
      'email'=>function() use($faker){
        return $faker->safeEmail();
      },
      'password'=>function() use($faker){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash('123');
      },
      'active'=>function() use($faker){
        return rand(0,1);
      }
    ]);
    $populator->execute();
}

}
