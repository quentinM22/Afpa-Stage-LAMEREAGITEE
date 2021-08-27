<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210827121051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autre (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price INT DEFAULT NULL, sold TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, collaboration_bool TINYINT(1) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autre_collaborateur (autre_id INT NOT NULL, collaborateur_id INT NOT NULL, INDEX IDX_7CD02730416A67AB (autre_id), INDEX IDX_7CD02730A848E3B1 (collaborateur_id), PRIMARY KEY(autre_id, collaborateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autre_autre_options (autre_id INT NOT NULL, autre_options_id INT NOT NULL, INDEX IDX_C85CF2416A67AB (autre_id), INDEX IDX_C85CF2E5C49988 (autre_options_id), PRIMARY KEY(autre_id, autre_options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autre_options (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coll_option (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collaborateur (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, job VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url_fb VARCHAR(255) DEFAULT NULL, url_insta VARCHAR(255) DEFAULT NULL, url_site VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collage (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price INT DEFAULT NULL, sold TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collage_coll_option (collage_id INT NOT NULL, coll_option_id INT NOT NULL, INDEX IDX_DE0E9FCDEC9066A4 (collage_id), INDEX IDX_DE0E9FCD76C02D2C (coll_option_id), PRIMARY KEY(collage_id, coll_option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mobi_option (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mobilier (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price INT DEFAULT NULL, sold TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mobilier_mobi_option (mobilier_id INT NOT NULL, mobi_option_id INT NOT NULL, INDEX IDX_408D5EC7713D397 (mobilier_id), INDEX IDX_408D5EC7253D07F0 (mobi_option_id), PRIMARY KEY(mobilier_id, mobi_option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE press_option (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presses (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, image_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presses_press_option (presses_id INT NOT NULL, press_option_id INT NOT NULL, INDEX IDX_A77327B7B2F3F6D6 (presses_id), INDEX IDX_A77327B7F494741C (press_option_id), PRIMARY KEY(presses_id, press_option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE autre_collaborateur ADD CONSTRAINT FK_7CD02730416A67AB FOREIGN KEY (autre_id) REFERENCES autre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE autre_collaborateur ADD CONSTRAINT FK_7CD02730A848E3B1 FOREIGN KEY (collaborateur_id) REFERENCES collaborateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE autre_autre_options ADD CONSTRAINT FK_C85CF2416A67AB FOREIGN KEY (autre_id) REFERENCES autre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE autre_autre_options ADD CONSTRAINT FK_C85CF2E5C49988 FOREIGN KEY (autre_options_id) REFERENCES autre_options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collage_coll_option ADD CONSTRAINT FK_DE0E9FCDEC9066A4 FOREIGN KEY (collage_id) REFERENCES collage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collage_coll_option ADD CONSTRAINT FK_DE0E9FCD76C02D2C FOREIGN KEY (coll_option_id) REFERENCES coll_option (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mobilier_mobi_option ADD CONSTRAINT FK_408D5EC7713D397 FOREIGN KEY (mobilier_id) REFERENCES mobilier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mobilier_mobi_option ADD CONSTRAINT FK_408D5EC7253D07F0 FOREIGN KEY (mobi_option_id) REFERENCES mobi_option (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE presses_press_option ADD CONSTRAINT FK_A77327B7B2F3F6D6 FOREIGN KEY (presses_id) REFERENCES presses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE presses_press_option ADD CONSTRAINT FK_A77327B7F494741C FOREIGN KEY (press_option_id) REFERENCES press_option (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE autre_collaborateur DROP FOREIGN KEY FK_7CD02730416A67AB');
        $this->addSql('ALTER TABLE autre_autre_options DROP FOREIGN KEY FK_C85CF2416A67AB');
        $this->addSql('ALTER TABLE autre_autre_options DROP FOREIGN KEY FK_C85CF2E5C49988');
        $this->addSql('ALTER TABLE collage_coll_option DROP FOREIGN KEY FK_DE0E9FCD76C02D2C');
        $this->addSql('ALTER TABLE autre_collaborateur DROP FOREIGN KEY FK_7CD02730A848E3B1');
        $this->addSql('ALTER TABLE collage_coll_option DROP FOREIGN KEY FK_DE0E9FCDEC9066A4');
        $this->addSql('ALTER TABLE mobilier_mobi_option DROP FOREIGN KEY FK_408D5EC7253D07F0');
        $this->addSql('ALTER TABLE mobilier_mobi_option DROP FOREIGN KEY FK_408D5EC7713D397');
        $this->addSql('ALTER TABLE presses_press_option DROP FOREIGN KEY FK_A77327B7F494741C');
        $this->addSql('ALTER TABLE presses_press_option DROP FOREIGN KEY FK_A77327B7B2F3F6D6');
        $this->addSql('DROP TABLE autre');
        $this->addSql('DROP TABLE autre_collaborateur');
        $this->addSql('DROP TABLE autre_autre_options');
        $this->addSql('DROP TABLE autre_options');
        $this->addSql('DROP TABLE coll_option');
        $this->addSql('DROP TABLE collaborateur');
        $this->addSql('DROP TABLE collage');
        $this->addSql('DROP TABLE collage_coll_option');
        $this->addSql('DROP TABLE mobi_option');
        $this->addSql('DROP TABLE mobilier');
        $this->addSql('DROP TABLE mobilier_mobi_option');
        $this->addSql('DROP TABLE press_option');
        $this->addSql('DROP TABLE presses');
        $this->addSql('DROP TABLE presses_press_option');
        $this->addSql('DROP TABLE user');
    }
}
