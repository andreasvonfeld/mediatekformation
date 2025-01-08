<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108162449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE video');
        $this->addSql('ALTER TABLE categorie CHANGE name name VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497DD6345E237E06 ON categorie (name)');
        $this->addSql('ALTER TABLE formation CHANGE title title VARCHAR(100) NOT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE video_id video_id VARCHAR(20) NOT NULL, CHANGE playlist_id playlist_id INT DEFAULT NULL, CHANGE published_at published_at DATETIME NOT NULL');
        $this->addSql('CREATE INDEX IDX_404021BF6BBD148 ON formation (playlist_id)');
        $this->addSql('ALTER TABLE formation_categorie CHANGE formation_id formation_id INT NOT NULL, CHANGE categorie_id categorie_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_830086E95200282E ON formation_categorie (formation_id)');
        $this->addSql('ALTER TABLE formation_categorie RENAME INDEX categorie_id TO IDX_830086E9BCF5E72D');
        $this->addSql('ALTER TABLE playlist CHANGE name name VARCHAR(100) NOT NULL, CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE video (id INT NOT NULL, url VARCHAR(200) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP INDEX UNIQ_497DD6345E237E06 ON categorie');
        $this->addSql('ALTER TABLE categorie CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF6BBD148');
        $this->addSql('DROP INDEX IDX_404021BF6BBD148 ON formation');
        $this->addSql('ALTER TABLE formation CHANGE playlist_id playlist_id INT NOT NULL, CHANGE published_at published_at DATE NOT NULL, CHANGE title title VARCHAR(60) NOT NULL COMMENT \'Nom de la formation\', CHANGE description description VARCHAR(500) DEFAULT NULL, CHANGE video_id video_id VARCHAR(200) NOT NULL');
        $this->addSql('ALTER TABLE formation_categorie DROP FOREIGN KEY FK_830086E95200282E');
        $this->addSql('ALTER TABLE formation_categorie DROP FOREIGN KEY FK_830086E9BCF5E72D');
        $this->addSql('DROP INDEX IDX_830086E95200282E ON formation_categorie');
        $this->addSql('ALTER TABLE formation_categorie CHANGE formation_id formation_id INT UNSIGNED NOT NULL, CHANGE categorie_id categorie_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE formation_categorie RENAME INDEX idx_830086e9bcf5e72d TO categorie_id');
        $this->addSql('ALTER TABLE playlist CHANGE name name VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(500) DEFAULT NULL');
    }
}
