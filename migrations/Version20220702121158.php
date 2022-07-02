<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220702121158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_29791883BA091CE5');
        $this->addSql('DROP INDEX UNIQ_29791883BA091CE5 ON information');
        $this->addSql('ALTER TABLE information CHANGE id_personne_id personne_id INT NOT NULL');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29791883A21BD112 ON information (personne_id)');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFAF272957');
        $this->addSql('DROP INDEX IDX_FCEC9EFAF272957 ON personne');
        $this->addSql('ALTER TABLE personne CHANGE nom nom VARCHAR(100) DEFAULT NULL, CHANGE id_equipage_id equipage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFB735E4A0 FOREIGN KEY (equipage_id) REFERENCES equipage (id)');
        $this->addSql('CREATE INDEX IDX_FCEC9EFB735E4A0 ON personne (equipage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_29791883A21BD112');
        $this->addSql('DROP INDEX UNIQ_29791883A21BD112 ON information');
        $this->addSql('ALTER TABLE information CHANGE personne_id id_personne_id INT NOT NULL');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29791883BA091CE5 ON information (id_personne_id)');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFB735E4A0');
        $this->addSql('DROP INDEX IDX_FCEC9EFB735E4A0 ON personne');
        $this->addSql('ALTER TABLE personne CHANGE nom nom VARCHAR(100) NOT NULL, CHANGE equipage_id id_equipage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFAF272957 FOREIGN KEY (id_equipage_id) REFERENCES equipage (id)');
        $this->addSql('CREATE INDEX IDX_FCEC9EFAF272957 ON personne (id_equipage_id)');
    }
}
