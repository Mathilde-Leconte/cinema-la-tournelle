<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230327090838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE information_page DROP nom, DROP tel_programmation, DROP tel_admin, DROP email, DROP instagram, DROP facebook, DROP site, DROP numero, DROP rue, DROP code_postal, DROP ville, DROP acces, DROP horraire');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE information_page ADD nom VARCHAR(255) NOT NULL, ADD tel_programmation INT DEFAULT NULL, ADD tel_admin INT DEFAULT NULL, ADD email VARCHAR(255) DEFAULT NULL, ADD instagram VARCHAR(255) DEFAULT NULL, ADD facebook VARCHAR(255) DEFAULT NULL, ADD site VARCHAR(255) DEFAULT NULL, ADD numero INT DEFAULT NULL, ADD rue VARCHAR(255) DEFAULT NULL, ADD code_postal VARCHAR(255) DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD acces LONGTEXT DEFAULT NULL, ADD horraire VARCHAR(255) DEFAULT NULL');
    }
}
