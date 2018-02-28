<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180228235229 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, created DATE DEFAULT NULL, updated DATE DEFAULT NULL, location_name VARCHAR(100) NOT NULL, latitude NUMERIC(10, 0) DEFAULT NULL, longitude NUMERIC(10, 0) DEFAULT NULL, provider VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE four_square_location (id INT NOT NULL, address VARCHAR(255) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, link VARCHAR(200) DEFAULT NULL, rating DOUBLE PRECISION DEFAULT NULL, price INT DEFAULT NULL, image VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timeout_location (id INT NOT NULL, description VARCHAR(200) NOT NULL, address VARCHAR(200) NOT NULL, category VARCHAR(200) NOT NULL, duration VARCHAR(200) NOT NULL, link VARCHAR(200) NOT NULL, rating DOUBLE PRECISION NOT NULL, rating_count NUMERIC(10, 0) NOT NULL, price VARCHAR(20) NOT NULL, image_thumb VARCHAR(200) NOT NULL, image_large VARCHAR(200) NOT NULL, featured TINYINT(1) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE viator_location (id INT NOT NULL, description VARCHAR(250) DEFAULT NULL, duration VARCHAR(50) DEFAULT NULL, link VARCHAR(200) DEFAULT NULL, rating DOUBLE PRECISION DEFAULT NULL, rating_count NUMERIC(10, 0) DEFAULT NULL, price VARCHAR(20) DEFAULT NULL, image_thumb VARCHAR(200) DEFAULT NULL, image_large VARCHAR(200) DEFAULT NULL, featured VARCHAR(255) DEFAULT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE four_square_location ADD CONSTRAINT FK_24F20FE7BF396750 FOREIGN KEY (id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE timeout_location ADD CONSTRAINT FK_471D8057BF396750 FOREIGN KEY (id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE viator_location ADD CONSTRAINT FK_82102BDEBF396750 FOREIGN KEY (id) REFERENCES location (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE four_square_location DROP FOREIGN KEY FK_24F20FE7BF396750');
        $this->addSql('ALTER TABLE timeout_location DROP FOREIGN KEY FK_471D8057BF396750');
        $this->addSql('ALTER TABLE viator_location DROP FOREIGN KEY FK_82102BDEBF396750');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE four_square_location');
        $this->addSql('DROP TABLE timeout_location');
        $this->addSql('DROP TABLE viator_location');
    }
}
