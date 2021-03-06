<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160819093841 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', 'integer', [
            'unsigned' => true,
            'notnull' => true
        ]);

        $table->addColumn('name', 'string', [
            'length' => 45,
            'notnull' => true
        ]);

        $table->addColumn('email', 'string', [
            'length' => 60,
            'notnull' => true
        ]);

        $table->addColumn('password', 'string', [
            'length' => 60,
            'notnull' => true
        ]);

        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['email']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        if ($schema->hasTable('users')) {
            $schema->dropTable('users');
        }
    }
}
