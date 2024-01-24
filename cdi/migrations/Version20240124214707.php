<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124214707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create genre table';
    }

    public function up(Schema $schema): void
    {
        // Créer la table 'genre'
        $this->addSql('CREATE TABLE genre (
            id INT AUTO_INCREMENT NOT NULL,
            nom VARCHAR(255) NOT NULL,
            description VARCHAR(255) NOT NULL,
            isbn VARCHAR(255) NOT NULL,
            emprunt DATETIME NOT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // Supprimer la table 'genre' si nécessaire
        $this->addSql('DROP TABLE genre');
    }
}
