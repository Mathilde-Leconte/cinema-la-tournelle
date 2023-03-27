<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230327091246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE info (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, tel_programmation INT DEFAULT NULL, tel_admin INT DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, site VARCHAR(255) DEFAULT NULL, numero VARCHAR(50) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, code_postale VARCHAR(20) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, acces VARCHAR(255) NOT NULL, horraire VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE info');
    }
}
