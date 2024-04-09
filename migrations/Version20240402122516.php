<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240402122516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adorer_maillot (adorer_id INT NOT NULL, maillot_id INT NOT NULL, INDEX IDX_AFED2642CB4033C6 (adorer_id), INDEX IDX_AFED26421630EB04 (maillot_id), PRIMARY KEY(adorer_id, maillot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adorer_maillot ADD CONSTRAINT FK_AFED2642CB4033C6 FOREIGN KEY (adorer_id) REFERENCES adorer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adorer_maillot ADD CONSTRAINT FK_AFED26421630EB04 FOREIGN KEY (maillot_id) REFERENCES maillot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adorer_maillot DROP FOREIGN KEY FK_AFED2642CB4033C6');
        $this->addSql('ALTER TABLE adorer_maillot DROP FOREIGN KEY FK_AFED26421630EB04');
        $this->addSql('DROP TABLE adorer_maillot');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
