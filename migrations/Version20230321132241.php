<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321132241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contenu_front_info (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, texte LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, emplacement VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information_page (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, presentation LONGTEXT NOT NULL, image_presentation VARCHAR(255) NOT NULL, titre_tarifs VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tarif ADD information_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C91177C375 FOREIGN KEY (information_page_id) REFERENCES information_page (id)');
        $this->addSql('CREATE INDEX IDX_E7189C91177C375 ON tarif (information_page_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C91177C375');
        $this->addSql('DROP TABLE contenu_front_info');
        $this->addSql('DROP TABLE information_page');
        $this->addSql('DROP INDEX IDX_E7189C91177C375 ON tarif');
        $this->addSql('ALTER TABLE tarif DROP information_page_id');
    }
}
