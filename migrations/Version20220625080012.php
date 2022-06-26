<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220625080012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, city_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, product_category_id_id INT DEFAULT NULL, product_id INT NOT NULL, product_name VARCHAR(255) NOT NULL, INDEX IDX_D34A04ADC41EAF32 (product_category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_category (id INT AUTO_INCREMENT NOT NULL, product_category_id INT NOT NULL, product_category_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supply (id INT AUTO_INCREMENT NOT NULL, product_id_id INT NOT NULL, vendor_id_id INT NOT NULL, supply_id INT NOT NULL, supply_date DATE DEFAULT NULL, supply_amount INT NOT NULL, supply_price INT NOT NULL, INDEX IDX_D219948CDE18E50B (product_id_id), INDEX IDX_D219948C69029C17 (vendor_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendor (id INT AUTO_INCREMENT NOT NULL, city_id_id INT NOT NULL, vendor_id INT NOT NULL, vendor_name VARCHAR(255) NOT NULL, INDEX IDX_F52233F63CCE3900 (city_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendor_product (vendor_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_CD3D3CC2F603EE73 (vendor_id), INDEX IDX_CD3D3CC24584665A (product_id), PRIMARY KEY(vendor_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendor_city (id INT AUTO_INCREMENT NOT NULL, vendor_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC41EAF32 FOREIGN KEY (product_category_id_id) REFERENCES product_category (id)');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948CDE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948C69029C17 FOREIGN KEY (vendor_id_id) REFERENCES vendor (id)');
        $this->addSql('ALTER TABLE vendor ADD CONSTRAINT FK_F52233F63CCE3900 FOREIGN KEY (city_id_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE vendor_product ADD CONSTRAINT FK_CD3D3CC2F603EE73 FOREIGN KEY (vendor_id) REFERENCES vendor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vendor_product ADD CONSTRAINT FK_CD3D3CC24584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vendor DROP FOREIGN KEY FK_F52233F63CCE3900');
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948CDE18E50B');
        $this->addSql('ALTER TABLE vendor_product DROP FOREIGN KEY FK_CD3D3CC24584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC41EAF32');
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948C69029C17');
        $this->addSql('ALTER TABLE vendor_product DROP FOREIGN KEY FK_CD3D3CC2F603EE73');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_category');
        $this->addSql('DROP TABLE supply');
        $this->addSql('DROP TABLE vendor');
        $this->addSql('DROP TABLE vendor_product');
        $this->addSql('DROP TABLE vendor_city');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
