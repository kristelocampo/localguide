<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230921154702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, id_guide_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, context LONGTEXT NOT NULL, publication_date DATE NOT NULL, INDEX IDX_23A0E668736F1DE (id_guide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, rating INT NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_8F91ABF079F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guide (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, bio LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_CA9EC73579F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE itineraries (id INT AUTO_INCREMENT NOT NULL, id_guide_id INT DEFAULT NULL, id_location_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, tarif NUMERIC(10, 2) NOT NULL, created_date DATE NOT NULL, INDEX IDX_E69D0F6C8736F1DE (id_guide_id), UNIQUE INDEX UNIQ_E69D0F6C1E5FEC79 (id_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE languages (id INT AUTO_INCREMENT NOT NULL, id_level_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A0D15379F6AA732 (id_level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E668736F1DE FOREIGN KEY (id_guide_id) REFERENCES guide (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF079F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE guide ADD CONSTRAINT FK_CA9EC73579F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE itineraries ADD CONSTRAINT FK_E69D0F6C8736F1DE FOREIGN KEY (id_guide_id) REFERENCES guide (id)');
        $this->addSql('ALTER TABLE itineraries ADD CONSTRAINT FK_E69D0F6C1E5FEC79 FOREIGN KEY (id_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE languages ADD CONSTRAINT FK_A0D15379F6AA732 FOREIGN KEY (id_level_id) REFERENCES level (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E668736F1DE');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF079F37AE5');
        $this->addSql('ALTER TABLE guide DROP FOREIGN KEY FK_CA9EC73579F37AE5');
        $this->addSql('ALTER TABLE itineraries DROP FOREIGN KEY FK_E69D0F6C8736F1DE');
        $this->addSql('ALTER TABLE itineraries DROP FOREIGN KEY FK_E69D0F6C1E5FEC79');
        $this->addSql('ALTER TABLE languages DROP FOREIGN KEY FK_A0D15379F6AA732');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE guide');
        $this->addSql('DROP TABLE itineraries');
        $this->addSql('DROP TABLE languages');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE location');
    }
}
