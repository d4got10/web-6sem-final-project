<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220625084754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vendor DROP FOREIGN KEY FK_F52233F63CCE3900');
        $this->addSql('DROP INDEX IDX_F52233F63CCE3900 ON vendor');
        $this->addSql('ALTER TABLE vendor CHANGE city_id_id city_id INT NOT NULL');
        $this->addSql('ALTER TABLE vendor ADD CONSTRAINT FK_F52233F68BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_F52233F68BAC62AF ON vendor (city_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vendor DROP FOREIGN KEY FK_F52233F68BAC62AF');
        $this->addSql('DROP INDEX IDX_F52233F68BAC62AF ON vendor');
        $this->addSql('ALTER TABLE vendor CHANGE city_id city_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE vendor ADD CONSTRAINT FK_F52233F63CCE3900 FOREIGN KEY (city_id_id) REFERENCES city (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F52233F63CCE3900 ON vendor (city_id_id)');
    }
}
