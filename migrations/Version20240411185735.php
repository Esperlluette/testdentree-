<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240411185735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE error_code ADD http_code VARCHAR(255) NOT NULL, ADD tag VARCHAR(255) NOT NULL, ADD message VARCHAR(255) NOT NULL, DROP code, DROP name, DROP output');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE error_code ADD code VARCHAR(255) NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD output VARCHAR(255) NOT NULL, DROP http_code, DROP tag, DROP message');
    }
}
