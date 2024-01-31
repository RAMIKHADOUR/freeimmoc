<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240130123259 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorys (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE installations (id INT AUTO_INCREMENT NOT NULL, internet TINYINT(1) DEFAULT NULL, balcon TINYINT(1) DEFAULT NULL, garage TINYINT(1) DEFAULT NULL, piscine TINYINT(1) DEFAULT NULL, gym TINYINT(1) DEFAULT NULL, caméra_surveillance TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisations (id INT AUTO_INCREMENT NOT NULL, n_voie INT NOT NULL, type_voie VARCHAR(100) NOT NULL, nom_voie VARCHAR(100) NOT NULL, villes VARCHAR(255) NOT NULL, codepostales INT NOT NULL, region VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propertys (id INT AUTO_INCREMENT NOT NULL, surface DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, chambres INT NOT NULL, salle_bains INT NOT NULL, etages INT NOT NULL, n_etage INT NOT NULL, image VARBINARY(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorys');
        $this->addSql('DROP TABLE installations');
        $this->addSql('DROP TABLE localisations');
        $this->addSql('DROP TABLE propertys');
        $this->addSql('DROP TABLE types');
    }
}
