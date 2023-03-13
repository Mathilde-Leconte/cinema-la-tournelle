<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230312203434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance ADD film_id INT DEFAULT NULL, ADD type_de_seance_id INT DEFAULT NULL, ADD evenement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EBB2EA298 FOREIGN KEY (type_de_seance_id) REFERENCES type_se_seance (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E567F5183 ON seance (film_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EBB2EA298 ON seance (type_de_seance_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EFD02F13 ON seance (evenement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E567F5183');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EBB2EA298');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EFD02F13');
        $this->addSql('DROP INDEX IDX_DF7DFD0E567F5183 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0EBB2EA298 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0EFD02F13 ON seance');
        $this->addSql('ALTER TABLE seance DROP film_id, DROP type_de_seance_id, DROP evenement_id');
    }
}
