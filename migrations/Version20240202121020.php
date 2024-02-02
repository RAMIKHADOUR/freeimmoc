<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202121020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE propertys_installations (propertys_id INT NOT NULL, installations_id INT NOT NULL, INDEX IDX_13D0FA2B4E998165 (propertys_id), INDEX IDX_13D0FA2B2B6BB138 (installations_id), PRIMARY KEY(propertys_id, installations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE propertys_installations ADD CONSTRAINT FK_13D0FA2B4E998165 FOREIGN KEY (propertys_id) REFERENCES propertys (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE propertys_installations ADD CONSTRAINT FK_13D0FA2B2B6BB138 FOREIGN KEY (installations_id) REFERENCES installations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE propertys ADD annonce_id INT NOT NULL, ADD category_id INT NOT NULL, ADD localisation_id INT NOT NULL');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C48805AB2F FOREIGN KEY (annonce_id) REFERENCES annonces (id)');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C412469DE2 FOREIGN KEY (category_id) REFERENCES categorys (id)');
        $this->addSql('ALTER TABLE propertys ADD CONSTRAINT FK_7AEEC2C4C68BE09C FOREIGN KEY (localisation_id) REFERENCES localisations (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7AEEC2C48805AB2F ON propertys (annonce_id)');
        $this->addSql('CREATE INDEX IDX_7AEEC2C412469DE2 ON propertys (category_id)');
        $this->addSql('CREATE INDEX IDX_7AEEC2C4C68BE09C ON propertys (localisation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE propertys_installations DROP FOREIGN KEY FK_13D0FA2B4E998165');
        $this->addSql('ALTER TABLE propertys_installations DROP FOREIGN KEY FK_13D0FA2B2B6BB138');
        $this->addSql('DROP TABLE propertys_installations');
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C48805AB2F');
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C412469DE2');
        $this->addSql('ALTER TABLE propertys DROP FOREIGN KEY FK_7AEEC2C4C68BE09C');
        $this->addSql('DROP INDEX UNIQ_7AEEC2C48805AB2F ON propertys');
        $this->addSql('DROP INDEX IDX_7AEEC2C412469DE2 ON propertys');
        $this->addSql('DROP INDEX IDX_7AEEC2C4C68BE09C ON propertys');
        $this->addSql('ALTER TABLE propertys DROP annonce_id, DROP category_id, DROP localisation_id');
    }
}
