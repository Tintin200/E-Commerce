<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240415063746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inserer (id INT AUTO_INCREMENT NOT NULL, maillot_id INT NOT NULL, panier_id INT NOT NULL, INDEX IDX_F2C216801630EB04 (maillot_id), INDEX IDX_F2C21680F77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inserer ADD CONSTRAINT FK_F2C216801630EB04 FOREIGN KEY (maillot_id) REFERENCES maillot (id)');
        $this->addSql('ALTER TABLE inserer ADD CONSTRAINT FK_F2C21680F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inserer DROP FOREIGN KEY FK_F2C216801630EB04');
        $this->addSql('ALTER TABLE inserer DROP FOREIGN KEY FK_F2C21680F77D927C');
        $this->addSql('DROP TABLE inserer');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
