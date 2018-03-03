<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180303164703 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE location CHANGE created created DATE DEFAULT NULL, CHANGE updated updated DATE DEFAULT NULL, CHANGE latitude latitude NUMERIC(10, 0) DEFAULT NULL, CHANGE longitude longitude NUMERIC(10, 0) DEFAULT NULL');
        $this->addSql('ALTER TABLE four_square_location CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE category category VARCHAR(255) DEFAULT NULL, CHANGE link link VARCHAR(200) DEFAULT NULL, CHANGE rating rating DOUBLE PRECISION DEFAULT NULL, CHANGE price price INT DEFAULT NULL, CHANGE image image VARCHAR(200) DEFAULT NULL');
        $this->addSql('ALTER TABLE timeout_location CHANGE description description VARCHAR(200) DEFAULT NULL, CHANGE address address VARCHAR(200) DEFAULT NULL, CHANGE category category VARCHAR(200) DEFAULT NULL, CHANGE link link VARCHAR(200) DEFAULT NULL, CHANGE rating rating DOUBLE PRECISION DEFAULT NULL, CHANGE price price VARCHAR(20) DEFAULT NULL, CHANGE image image VARCHAR(200) DEFAULT NULL, CHANGE image_dynamic image_dynamic VARCHAR(200) DEFAULT NULL, CHANGE featured featured TINYINT(1) DEFAULT NULL, CHANGE start_date start_date DATE DEFAULT NULL, CHANGE end_date end_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE viator_location CHANGE description description VARCHAR(250) DEFAULT NULL, CHANGE duration duration VARCHAR(50) DEFAULT NULL, CHANGE link link VARCHAR(200) DEFAULT NULL, CHANGE rating rating DOUBLE PRECISION DEFAULT NULL, CHANGE rating_count rating_count NUMERIC(10, 0) DEFAULT NULL, CHANGE price price VARCHAR(200) DEFAULT NULL, CHANGE image_thumb image_thumb VARCHAR(200) DEFAULT NULL, CHANGE image_large image_large VARCHAR(200) DEFAULT NULL, CHANGE featured featured VARCHAR(255) DEFAULT NULL, CHANGE start_date start_date DATE DEFAULT NULL, CHANGE end_date end_date DATE DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE four_square_location CHANGE address address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE category category VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE link link VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE rating rating DOUBLE PRECISION DEFAULT \'NULL\', CHANGE price price INT DEFAULT NULL, CHANGE image image VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE location CHANGE created created DATE DEFAULT \'NULL\', CHANGE updated updated DATE DEFAULT \'NULL\', CHANGE latitude latitude NUMERIC(10, 0) DEFAULT \'NULL\', CHANGE longitude longitude NUMERIC(10, 0) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE timeout_location CHANGE description description VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE address address VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE category category VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE link link VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE rating rating DOUBLE PRECISION DEFAULT \'NULL\', CHANGE price price VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE image image VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE image_dynamic image_dynamic VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE featured featured TINYINT(1) DEFAULT \'NULL\', CHANGE start_date start_date DATE DEFAULT \'NULL\', CHANGE end_date end_date DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE viator_location CHANGE description description VARCHAR(250) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE duration duration VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE link link VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE rating rating DOUBLE PRECISION DEFAULT \'NULL\', CHANGE rating_count rating_count NUMERIC(10, 0) DEFAULT \'NULL\', CHANGE price price VARCHAR(20) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE image_thumb image_thumb VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE image_large image_large VARCHAR(200) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE featured featured VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE start_date start_date DATE DEFAULT \'NULL\', CHANGE end_date end_date DATE DEFAULT \'NULL\'');
    }
}
