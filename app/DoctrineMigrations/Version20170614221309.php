<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170614221309 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jam_jar DROP FOREIGN KEY FK_463B822A52F43E8');
        $this->addSql('DROP INDEX IDX_463B822A52F43E8 ON jam_jar');
        $this->addSql('ALTER TABLE jam_jar CHANGE jam_jar_id jam_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jam_jar ADD CONSTRAINT FK_463B8229ED3C46A FOREIGN KEY (jam_type_id) REFERENCES jam_type (id)');
        $this->addSql('CREATE INDEX IDX_463B8229ED3C46A ON jam_jar (jam_type_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jam_jar DROP FOREIGN KEY FK_463B8229ED3C46A');
        $this->addSql('DROP INDEX IDX_463B8229ED3C46A ON jam_jar');
        $this->addSql('ALTER TABLE jam_jar CHANGE jam_type_id jam_jar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jam_jar ADD CONSTRAINT FK_463B822A52F43E8 FOREIGN KEY (jam_jar_id) REFERENCES jam_type (id)');
        $this->addSql('CREATE INDEX IDX_463B822A52F43E8 ON jam_jar (jam_jar_id)');
    }
}
