<?php
use Migrations\AbstractMigration;

class CreateViewAccess extends AbstractMigration
{
  public function up()
{
    $this->table('view_access', ['id' => false, 'primary_key' => 'id'])
        ->addColumn('id', 'integer', ['identity' => true, 'signed' => false])
        ->addColumn('role_id', 'integer', ['signed' => false, 'null' => false])
        ->addColumn('view_name', 'string', ['length' => 255])
        ->addColumn('controller_name', 'string', ['length' => 255])
        ->save();
}

/**
 * Migrate Down.
 */
public function down()
{
    $this->dropTable('view_access');
}
}
