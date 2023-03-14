<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222101745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotels CHANGE manager_id manager_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hotels ADD CONSTRAINT FK_E402F625783E3463 FOREIGN KEY (manager_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E402F625783E3463 ON hotels (manager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotels DROP FOREIGN KEY FK_E402F625783E3463');
        $this->addSql('DROP INDEX IDX_E402F625783E3463 ON hotels');
        $this->addSql('ALTER TABLE hotels CHANGE manager_id manager_id INT NOT NULL');
    }
}
