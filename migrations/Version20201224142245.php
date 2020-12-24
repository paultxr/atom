<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201224142245 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist_genre (artist_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_E35C03ABB7970CF8 (artist_id), INDEX IDX_E35C03AB4296D31F (genre_id), PRIMARY KEY(artist_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, media_id INT NOT NULL, comment LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_9474526CA76ED395 (user_id), UNIQUE INDEX UNIQ_9474526CEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, question LONGTEXT NOT NULL, answer LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, artist_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url LONGTEXT NOT NULL, INDEX IDX_6A2CA10CB7970CF8 (artist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, media_id INT NOT NULL, method VARCHAR(255) NOT NULL, INDEX IDX_6D28840DA76ED395 (user_id), INDEX IDX_6D28840DEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, address LONGTEXT NOT NULL, city VARCHAR(255) NOT NULL, zip_code INT NOT NULL, country VARCHAR(255) NOT NULL, payment_info VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_artist (user_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_640B8DBAA76ED395 (user_id), INDEX IDX_640B8DBAB7970CF8 (artist_id), PRIMARY KEY(user_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_genre (user_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_6192C8A0A76ED395 (user_id), INDEX IDX_6192C8A04296D31F (genre_id), PRIMARY KEY(user_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_genre ADD CONSTRAINT FK_E35C03ABB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_genre ADD CONSTRAINT FK_E35C03AB4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE user_artist ADD CONSTRAINT FK_640B8DBAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_artist ADD CONSTRAINT FK_640B8DBAB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_genre ADD CONSTRAINT FK_6192C8A0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_genre ADD CONSTRAINT FK_6192C8A04296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist_genre DROP FOREIGN KEY FK_E35C03AB4296D31F');
        $this->addSql('ALTER TABLE user_genre DROP FOREIGN KEY FK_6192C8A04296D31F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CEA9FDD75');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DEA9FDD75');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DA76ED395');
        $this->addSql('ALTER TABLE user_artist DROP FOREIGN KEY FK_640B8DBAA76ED395');
        $this->addSql('ALTER TABLE user_genre DROP FOREIGN KEY FK_6192C8A0A76ED395');
        $this->addSql('DROP TABLE artist_genre');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_artist');
        $this->addSql('DROP TABLE user_genre');
    }
}
