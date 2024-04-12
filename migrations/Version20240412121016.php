<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240412121016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE associer_box (id INT AUTO_INCREMENT NOT NULL, box_id INT DEFAULT NULL, taille_id INT DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, stock INT NOT NULL, INDEX IDX_CEA1AFE0D8177B3F (box_id), INDEX IDX_CEA1AFE0FF25611A (taille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE associer_box ADD CONSTRAINT FK_CEA1AFE0D8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE associer_box ADD CONSTRAINT FK_CEA1AFE0FF25611A FOREIGN KEY (taille_id) REFERENCES taille (id)');
        $this->addSql('ALTER TABLE box DROP prix');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE associer_box DROP FOREIGN KEY FK_CEA1AFE0D8177B3F');
        $this->addSql('ALTER TABLE associer_box DROP FOREIGN KEY FK_CEA1AFE0FF25611A');
        $this->addSql('DROP TABLE associer_box');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE box ADD prix DOUBLE PRECISION NOT NULL');
    }
}
