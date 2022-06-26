<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220625090356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC41EAF32');
        $this->addSql('DROP INDEX IDX_D34A04ADC41EAF32 ON product');
        $this->addSql('ALTER TABLE product CHANGE product_category_id_id product_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBE6903FD FOREIGN KEY (product_category_id) REFERENCES product_category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADBE6903FD ON product (product_category_id)');
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948C69029C17');
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948CDE18E50B');
        $this->addSql('DROP INDEX IDX_D219948C69029C17 ON supply');
        $this->addSql('DROP INDEX IDX_D219948CDE18E50B ON supply');
        $this->addSql('ALTER TABLE supply ADD product_id INT NOT NULL, ADD vendor_id INT NOT NULL, DROP product_id_id, DROP vendor_id_id');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948CF603EE73 FOREIGN KEY (vendor_id) REFERENCES vendor (id)');
        $this->addSql('CREATE INDEX IDX_D219948C4584665A ON supply (product_id)');
        $this->addSql('CREATE INDEX IDX_D219948CF603EE73 ON supply (vendor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBE6903FD');
        $this->addSql('DROP INDEX IDX_D34A04ADBE6903FD ON product');
        $this->addSql('ALTER TABLE product CHANGE product_category_id product_category_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC41EAF32 FOREIGN KEY (product_category_id_id) REFERENCES product_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D34A04ADC41EAF32 ON product (product_category_id_id)');
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948C4584665A');
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948CF603EE73');
        $this->addSql('DROP INDEX IDX_D219948C4584665A ON supply');
        $this->addSql('DROP INDEX IDX_D219948CF603EE73 ON supply');
        $this->addSql('ALTER TABLE supply ADD product_id_id INT NOT NULL, ADD vendor_id_id INT NOT NULL, DROP product_id, DROP vendor_id');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948C69029C17 FOREIGN KEY (vendor_id_id) REFERENCES vendor (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948CDE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D219948C69029C17 ON supply (vendor_id_id)');
        $this->addSql('CREATE INDEX IDX_D219948CDE18E50B ON supply (product_id_id)');
    }
}
