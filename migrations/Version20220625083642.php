<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220625083642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE supply DROP supply_id');
        $this->addSql('ALTER TABLE product DROP product_id');
        $this->addSql('ALTER TABLE vendor DROP vendor_id');
        $this->addSql('DROP TABLE vendor_city');
        $this->addSql('ALTER TABLE product_category DROP product_category_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vendor_city (id INT AUTO_INCREMENT NOT NULL, vendor_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product ADD product_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_category ADD product_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE supply ADD supply_id INT NOT NULL');
        $this->addSql('ALTER TABLE vendor ADD vendor_id INT NOT NULL');
    }
}
