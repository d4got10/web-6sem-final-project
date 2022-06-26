<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220626024242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948CF603EE73 FOREIGN KEY (vendor_id) REFERENCES vendor (id)');
        $this->addSql('CREATE INDEX IDX_D219948C4584665A ON supply (product_id)');
        $this->addSql('CREATE INDEX IDX_D219948CF603EE73 ON supply (vendor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948C4584665A');
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948CF603EE73');
        $this->addSql('DROP INDEX IDX_D219948C4584665A ON supply');
        $this->addSql('DROP INDEX IDX_D219948CF603EE73 ON supply');
    }
}
