<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308114910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C9BB2EA298');
        $this->addSql('DROP INDEX IDX_E7189C9BB2EA298 ON tarif');
        $this->addSql('ALTER TABLE tarif DROP type_de_seance_id, DROP prix');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarif ADD type_de_seance_id INT DEFAULT NULL, ADD prix INT NOT NULL');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C9BB2EA298 FOREIGN KEY (type_de_seance_id) REFERENCES type_de_seance (id)');
        $this->addSql('CREATE INDEX IDX_E7189C9BB2EA298 ON tarif (type_de_seance_id)');
    }
}
