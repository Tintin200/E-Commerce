<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240507121902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ajouter (id INT AUTO_INCREMENT NOT NULL, panier_id INT DEFAULT NULL, maillot_id INT DEFAULT NULL, box_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_AB384B5FF77D927C (panier_id), INDEX IDX_AB384B5F1630EB04 (maillot_id), INDEX IDX_AB384B5FD8177B3F (box_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5FF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5F1630EB04 FOREIGN KEY (maillot_id) REFERENCES maillot (id)');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5FD8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5FF77D927C');
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5F1630EB04');
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5FD8177B3F');
        $this->addSql('DROP TABLE ajouter');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
