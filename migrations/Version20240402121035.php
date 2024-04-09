<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240402121035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adorer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adorer_maillot (adorer_id INT NOT NULL, maillot_id INT NOT NULL, INDEX IDX_AFED2642CB4033C6 (adorer_id), INDEX IDX_AFED26421630EB04 (maillot_id), PRIMARY KEY(adorer_id, maillot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adorer_box (adorer_id INT NOT NULL, box_id INT NOT NULL, INDEX IDX_11B1071FCB4033C6 (adorer_id), INDEX IDX_11B1071FD8177B3F (box_id), PRIMARY KEY(adorer_id, box_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adorer_maillot ADD CONSTRAINT FK_AFED2642CB4033C6 FOREIGN KEY (adorer_id) REFERENCES adorer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adorer_maillot ADD CONSTRAINT FK_AFED26421630EB04 FOREIGN KEY (maillot_id) REFERENCES maillot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adorer_box ADD CONSTRAINT FK_11B1071FCB4033C6 FOREIGN KEY (adorer_id) REFERENCES adorer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adorer_box ADD CONSTRAINT FK_11B1071FD8177B3F FOREIGN KEY (box_id) REFERENCES box (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adorer_maillot DROP FOREIGN KEY FK_AFED2642CB4033C6');
        $this->addSql('ALTER TABLE adorer_maillot DROP FOREIGN KEY FK_AFED26421630EB04');
        $this->addSql('ALTER TABLE adorer_box DROP FOREIGN KEY FK_11B1071FCB4033C6');
        $this->addSql('ALTER TABLE adorer_box DROP FOREIGN KEY FK_11B1071FD8177B3F');
        $this->addSql('DROP TABLE adorer');
        $this->addSql('DROP TABLE adorer_maillot');
        $this->addSql('DROP TABLE adorer_box');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
