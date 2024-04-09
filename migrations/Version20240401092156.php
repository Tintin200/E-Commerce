<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240401092156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE associer ADD taille_id INT NOT NULL');
        $this->addSql('ALTER TABLE associer ADD CONSTRAINT FK_FA230DB9FF25611A FOREIGN KEY (taille_id) REFERENCES taille (id)');
        $this->addSql('CREATE INDEX IDX_FA230DB9FF25611A ON associer (taille_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE associer DROP FOREIGN KEY FK_FA230DB9FF25611A');
        $this->addSql('DROP INDEX IDX_FA230DB9FF25611A ON associer');
        $this->addSql('ALTER TABLE associer DROP taille_id');
    }
}
