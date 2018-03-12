<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180312093956 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_media (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, media_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_88EE5A54A76ED395 (user_id), INDEX IDX_88EE5A54EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, episode INT NOT NULL, description LONGTEXT NOT NULL, duree INT NOT NULL, acteur VARCHAR(255) NOT NULL, sortie DATE NOT NULL, INDEX IDX_AA3A9334EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie_type_serie (serie_id INT NOT NULL, type_serie_id INT NOT NULL, INDEX IDX_F5C05EC7D94388BD (serie_id), INDEX IDX_F5C05EC714BCAF41 (type_serie_id), PRIMARY KEY(serie_id, type_serie_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, token VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_anime (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, duree INT NOT NULL, acteur VARCHAR(255) NOT NULL, sortie DATE NOT NULL, UNIQUE INDEX UNIQ_8244BE22EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_type_film (film_id INT NOT NULL, type_film_id INT NOT NULL, INDEX IDX_61872519567F5183 (film_id), INDEX IDX_618725197E5E3E76 (type_film_id), PRIMARY KEY(film_id, type_film_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_film (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_serie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_6A2CA10CEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE anime (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, episode INT NOT NULL, description LONGTEXT NOT NULL, duree INT NOT NULL, INDEX IDX_13045942EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE anime_type_anime (anime_id INT NOT NULL, type_anime_id INT NOT NULL, INDEX IDX_1ABE44A5794BBE89 (anime_id), INDEX IDX_1ABE44A5B4B49975 (type_anime_id), PRIMARY KEY(anime_id, type_anime_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_media ADD CONSTRAINT FK_88EE5A54A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_media ADD CONSTRAINT FK_88EE5A54EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE serie_type_serie ADD CONSTRAINT FK_F5C05EC7D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_type_serie ADD CONSTRAINT FK_F5C05EC714BCAF41 FOREIGN KEY (type_serie_id) REFERENCES type_serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE film_type_film ADD CONSTRAINT FK_61872519567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_type_film ADD CONSTRAINT FK_618725197E5E3E76 FOREIGN KEY (type_film_id) REFERENCES type_film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CEA9FDD75 FOREIGN KEY (media_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE anime ADD CONSTRAINT FK_13045942EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE anime_type_anime ADD CONSTRAINT FK_1ABE44A5794BBE89 FOREIGN KEY (anime_id) REFERENCES anime (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE anime_type_anime ADD CONSTRAINT FK_1ABE44A5B4B49975 FOREIGN KEY (type_anime_id) REFERENCES type_anime (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE serie_type_serie DROP FOREIGN KEY FK_F5C05EC7D94388BD');
        $this->addSql('ALTER TABLE user_media DROP FOREIGN KEY FK_88EE5A54A76ED395');
        $this->addSql('ALTER TABLE anime_type_anime DROP FOREIGN KEY FK_1ABE44A5B4B49975');
        $this->addSql('ALTER TABLE film_type_film DROP FOREIGN KEY FK_61872519567F5183');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CEA9FDD75');
        $this->addSql('ALTER TABLE film_type_film DROP FOREIGN KEY FK_618725197E5E3E76');
        $this->addSql('ALTER TABLE serie_type_serie DROP FOREIGN KEY FK_F5C05EC714BCAF41');
        $this->addSql('ALTER TABLE user_media DROP FOREIGN KEY FK_88EE5A54EA9FDD75');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334EA9FDD75');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22EA9FDD75');
        $this->addSql('ALTER TABLE anime DROP FOREIGN KEY FK_13045942EA9FDD75');
        $this->addSql('ALTER TABLE anime_type_anime DROP FOREIGN KEY FK_1ABE44A5794BBE89');
        $this->addSql('DROP TABLE user_media');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE serie_type_serie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE type_anime');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_type_film');
        $this->addSql('DROP TABLE type_film');
        $this->addSql('DROP TABLE type_serie');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE anime');
        $this->addSql('DROP TABLE anime_type_anime');
    }
}
