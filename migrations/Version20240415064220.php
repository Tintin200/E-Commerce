<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240415064220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inserer ADD box_id INT NOT NULL');
        $this->addSql('ALTER TABLE inserer ADD CONSTRAINT FK_F2C21680D8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
        $this->addSql('CREATE INDEX IDX_F2C21680D8177B3F ON inserer (box_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE inserer DROP FOREIGN KEY FK_F2C21680D8177B3F');
        $this->addSql('DROP INDEX IDX_F2C21680D8177B3F ON inserer');
        $this->addSql('ALTER TABLE inserer DROP box_id');
    }
}
