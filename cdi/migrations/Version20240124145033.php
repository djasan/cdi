<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124145033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Créer la table 'category'
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Créer la table 'livre' avec une relation vers 'category'
        $this->addSql('CREATE TABLE livre (
            id INT AUTO_INCREMENT NOT NULL, 
            image VARCHAR(255) NOT NULL, 
            auteur VARCHAR(255) NOT NULL, 
            titre VARCHAR(255) NOT NULL, 
            editeur VARCHAR(255) NOT NULL, 
            category_id INT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT FK_Category FOREIGN KEY (category_id) REFERENCES category(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // Ajoutez le code pour défaire les modifications (DROP TABLE, etc.) dans cette méthode si nécessaire.
    }
}
