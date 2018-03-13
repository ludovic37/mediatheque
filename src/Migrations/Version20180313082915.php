<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180313082915 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE serie_episode (id INT AUTO_INCREMENT NOT NULL, serie_id INT DEFAULT NULL, episode INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, duree INT NOT NULL, sortie DATE NOT NULL, INDEX IDX_E9336F7DD94388BD (serie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE anime_episode (id INT AUTO_INCREMENT NOT NULL, anime_id INT DEFAULT NULL, episode INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, duree INT NOT NULL, sortie DATE NOT NULL, INDEX IDX_C8C63B17794BBE89 (anime_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE serie_episode ADD CONSTRAINT FK_E9336F7DD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE anime_episode ADD CONSTRAINT FK_C8C63B17794BBE89 FOREIGN KEY (anime_id) REFERENCES anime (id)');
        $this->addSql('ALTER TABLE anime DROP episode, DROP duree, DROP sortie');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE serie_episode');
        $this->addSql('DROP TABLE anime_episode');
        $this->addSql('ALTER TABLE anime ADD episode INT NOT NULL, ADD duree INT NOT NULL, ADD sortie DATE NOT NULL');
    }
}
