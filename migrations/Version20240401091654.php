<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240401091654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE associer (id INT AUTO_INCREMENT NOT NULL, maillot_id INT NOT NULL, box_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, stock INT NOT NULL, INDEX IDX_FA230DB91630EB04 (maillot_id), INDEX IDX_FA230DB9D8177B3F (box_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE associer ADD CONSTRAINT FK_FA230DB91630EB04 FOREIGN KEY (maillot_id) REFERENCES maillot (id)');
        $this->addSql('ALTER TABLE associer ADD CONSTRAINT FK_FA230DB9D8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE associer DROP FOREIGN KEY FK_FA230DB91630EB04');
        $this->addSql('ALTER TABLE associer DROP FOREIGN KEY FK_FA230DB9D8177B3F');
        $this->addSql('DROP TABLE associer');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
