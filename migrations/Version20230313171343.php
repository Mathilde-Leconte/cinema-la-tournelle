<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313171343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, duree INT DEFAULT NULL, collaboration VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, realisation VARCHAR(255) NOT NULL, casting VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) NOT NULL, duree INT NOT NULL, synopsis LONGTEXT NOT NULL, recompense LONGTEXT DEFAULT NULL, distributeur VARCHAR(255) NOT NULL, cout_location VARCHAR(255) DEFAULT NULL, vo_film TINYINT(1) NOT NULL, vost_film TINYINT(1) NOT NULL, deux_dfilm TINYINT(1) NOT NULL, trois_dfilm TINYINT(1) NOT NULL, age INT DEFAULT NULL, a_partir TINYINT(1) NOT NULL, interdit_ans TINYINT(1) NOT NULL, a_partir_mois TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, film_id INT DEFAULT NULL, type_de_seance_id INT DEFAULT NULL, evenement_id INT DEFAULT NULL, start DATETIME DEFAULT NULL, end DATETIME DEFAULT NULL, INDEX IDX_DF7DFD0E567F5183 (film_id), INDEX IDX_DF7DFD0EBB2EA298 (type_de_seance_id), INDEX IDX_DF7DFD0EFD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif_type_se_seance (tarif_id INT NOT NULL, type_se_seance_id INT NOT NULL, INDEX IDX_35C96619357C0A59 (tarif_id), INDEX IDX_35C96619C3AEA6EB (type_se_seance_id), PRIMARY KEY(tarif_id, type_se_seance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_se_seance (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prive TINYINT(1) NOT NULL, publique TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EBB2EA298 FOREIGN KEY (type_de_seance_id) REFERENCES type_se_seance (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE tarif_type_se_seance ADD CONSTRAINT FK_35C96619357C0A59 FOREIGN KEY (tarif_id) REFERENCES tarif (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarif_type_se_seance ADD CONSTRAINT FK_35C96619C3AEA6EB FOREIGN KEY (type_se_seance_id) REFERENCES type_se_seance (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E567F5183');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EBB2EA298');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EFD02F13');
        $this->addSql('ALTER TABLE tarif_type_se_seance DROP FOREIGN KEY FK_35C96619357C0A59');
        $this->addSql('ALTER TABLE tarif_type_se_seance DROP FOREIGN KEY FK_35C96619C3AEA6EB');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE tarif');
        $this->addSql('DROP TABLE tarif_type_se_seance');
        $this->addSql('DROP TABLE type_se_seance');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
