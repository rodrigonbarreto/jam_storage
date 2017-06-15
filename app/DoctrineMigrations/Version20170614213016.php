<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170614213016 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jam_jar ADD jam_year_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jam_jar ADD CONSTRAINT FK_463B8221B5EB65E FOREIGN KEY (jam_year_id) REFERENCES jam_year (id)');
        $this->addSql('CREATE INDEX IDX_463B8221B5EB65E ON jam_jar (jam_year_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jam_jar DROP FOREIGN KEY FK_463B8221B5EB65E');
        $this->addSql('DROP INDEX IDX_463B8221B5EB65E ON jam_jar');
        $this->addSql('ALTER TABLE jam_jar DROP jam_year_id');
    }
}
