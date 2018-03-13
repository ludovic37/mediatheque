<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180313081057 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE anime DROP FOREIGN KEY FK_13045942EA9FDD75');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22EA9FDD75');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334EA9FDD75');
        $this->addSql('ALTER TABLE user_media DROP FOREIGN KEY FK_88EE5A54EA9FDD75');
        $this->addSql('CREATE TABLE user_film (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, film_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_F8C5F2EBA76ED395 (user_id), INDEX IDX_F8C5F2EB567F5183 (film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_anime (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, anime_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_F1C6A21AA76ED395 (user_id), INDEX IDX_F1C6A21A794BBE89 (anime_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_serie (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, serie_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_48F8686CA76ED395 (user_id), INDEX IDX_48F8686CD94388BD (serie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_film ADD CONSTRAINT FK_F8C5F2EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_film ADD CONSTRAINT FK_F8C5F2EB567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE user_anime ADD CONSTRAINT FK_F1C6A21AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_anime ADD CONSTRAINT FK_F1C6A21A794BBE89 FOREIGN KEY (anime_id) REFERENCES anime (id)');
        $this->addSql('ALTER TABLE user_serie ADD CONSTRAINT FK_48F8686CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_serie ADD CONSTRAINT FK_48F8686CD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE user_media');
        $this->addSql('DROP INDEX IDX_AA3A9334EA9FDD75 ON serie');
        $this->addSql('ALTER TABLE serie ADD name VARCHAR(255) NOT NULL, ADD img VARCHAR(255) NOT NULL, DROP media_id, DROP episode, DROP duree, DROP sortie');
        $this->addSql('DROP INDEX UNIQ_8244BE22EA9FDD75 ON film');
        $this->addSql('ALTER TABLE film ADD name VARCHAR(255) NOT NULL, ADD img VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL, DROP media_id');
        $this->addSql('DROP INDEX IDX_13045942EA9FDD75 ON anime');
        $this->addSql('ALTER TABLE anime ADD name VARCHAR(255) NOT NULL, ADD img VARCHAR(255) NOT NULL, DROP media_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, img VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_media (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, media_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_88EE5A54A76ED395 (user_id), INDEX IDX_88EE5A54EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_media ADD CONSTRAINT FK_88EE5A54A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_media ADD CONSTRAINT FK_88EE5A54EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('DROP TABLE user_film');
        $this->addSql('DROP TABLE user_anime');
        $this->addSql('DROP TABLE user_serie');
        $this->addSql('ALTER TABLE anime ADD media_id INT DEFAULT NULL, DROP name, DROP img');
        $this->addSql('ALTER TABLE anime ADD CONSTRAINT FK_13045942EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_13045942EA9FDD75 ON anime (media_id)');
        $this->addSql('ALTER TABLE film ADD media_id INT DEFAULT NULL, DROP name, DROP img, DROP description');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8244BE22EA9FDD75 ON film (media_id)');
        $this->addSql('ALTER TABLE serie ADD media_id INT DEFAULT NULL, ADD episode INT NOT NULL, ADD duree INT NOT NULL, ADD sortie DATE NOT NULL, DROP name, DROP img');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_AA3A9334EA9FDD75 ON serie (media_id)');
    }
}
