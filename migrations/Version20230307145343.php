<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307145343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_de_seance (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prive TINYINT(1) NOT NULL, publique TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE description');
        $this->addSql('DROP TABLE statut');
        $this->addSql('ALTER TABLE tarif ADD type_de_seance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C9BB2EA298 FOREIGN KEY (type_de_seance_id) REFERENCES type_de_seance (id)');
        $this->addSql('CREATE INDEX IDX_E7189C9BB2EA298 ON tarif (type_de_seance_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C9BB2EA298');
        $this->addSql('CREATE TABLE description (id INT AUTO_INCREMENT NOT NULL, texte LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, prive TINYINT(1) NOT NULL, publique TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE type_de_seance');
        $this->addSql('DROP INDEX IDX_E7189C9BB2EA298 ON tarif');
        $this->addSql('ALTER TABLE tarif DROP type_de_seance_id');
    }
}
