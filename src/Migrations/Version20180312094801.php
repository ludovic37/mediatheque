<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180312094801 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CEA9FDD75');
        $this->addSql('DROP INDEX UNIQ_6A2CA10CEA9FDD75 ON media');
        $this->addSql('ALTER TABLE media CHANGE media_id film_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6A2CA10C567F5183 ON media (film_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C567F5183');
        $this->addSql('DROP INDEX UNIQ_6A2CA10C567F5183 ON media');
        $this->addSql('ALTER TABLE media CHANGE film_id media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CEA9FDD75 FOREIGN KEY (media_id) REFERENCES film (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6A2CA10CEA9FDD75 ON media (media_id)');
    }
}
