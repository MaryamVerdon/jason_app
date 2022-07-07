<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220706144954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipage (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, quantite_max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, equipage_id INT DEFAULT NULL, role_id INT NOT NULL, rang_id INT NOT NULL, nom VARCHAR(100) DEFAULT NULL, prenom VARCHAR(100) NOT NULL, mail VARCHAR(150) NOT NULL, ville VARCHAR(150) NOT NULL, age INT NOT NULL, description LONGTEXT NOT NULL, sexe TINYINT(1) NOT NULL, photo VARCHAR(255) DEFAULT NULL, faiblesse VARCHAR(50) NOT NULL, pt_fort VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_FCEC9EF5126AC48 (mail), INDEX IDX_FCEC9EFB735E4A0 (equipage_id), INDEX IDX_FCEC9EFD60322AC (role_id), INDEX IDX_FCEC9EF3CC0D837 (rang_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rang (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFB735E4A0 FOREIGN KEY (equipage_id) REFERENCES equipage (id)');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFD60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EF3CC0D837 FOREIGN KEY (rang_id) REFERENCES rang (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFB735E4A0');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EF3CC0D837');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFD60322AC');
        $this->addSql('DROP TABLE equipage');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE rang');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
