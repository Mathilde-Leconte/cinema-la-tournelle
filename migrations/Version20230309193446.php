<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230309193446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tarif (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif_type_se_seance (tarif_id INT NOT NULL, type_se_seance_id INT NOT NULL, INDEX IDX_35C96619357C0A59 (tarif_id), INDEX IDX_35C96619C3AEA6EB (type_se_seance_id), PRIMARY KEY(tarif_id, type_se_seance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_se_seance (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prive TINYINT(1) NOT NULL, publique TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tarif_type_se_seance ADD CONSTRAINT FK_35C96619357C0A59 FOREIGN KEY (tarif_id) REFERENCES tarif (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarif_type_se_seance ADD CONSTRAINT FK_35C96619C3AEA6EB FOREIGN KEY (type_se_seance_id) REFERENCES type_se_seance (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarif_type_se_seance DROP FOREIGN KEY FK_35C96619357C0A59');
        $this->addSql('ALTER TABLE tarif_type_se_seance DROP FOREIGN KEY FK_35C96619C3AEA6EB');
        $this->addSql('DROP TABLE tarif');
        $this->addSql('DROP TABLE tarif_type_se_seance');
        $this->addSql('DROP TABLE type_se_seance');
    }
}
