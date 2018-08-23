<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180822133521 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rate DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pricing (id INT AUTO_INCREMENT NOT NULL, period VARCHAR(255) DEFAULT NULL, date_start DATETIME DEFAULT NULL, date_end DATETIME DEFAULT NULL, hour_price DOUBLE PRECISION DEFAULT NULL, kilometer_price DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rate DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(60) NOT NULL, firstName VARCHAR(255) DEFAULT NULL, lastName VARCHAR(255) DEFAULT NULL, birthDate DATE DEFAULT NULL, isAdmin TINYINT(1) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, type_id INT DEFAULT NULL, classification_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, starting_price INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_D79572D944F5D008 (brand_id), INDEX IDX_D79572D9C54C8C93 (type_id), INDEX IDX_D79572D92A86559F (classification_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, vehicle_id INT DEFAULT NULL, kilometer_id INT DEFAULT NULL, status_id INT DEFAULT NULL, date_start DATE DEFAULT NULL, date_end DATE DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_42C84955A76ED395 (user_id), INDEX IDX_42C84955545317D1 (vehicle_id), INDEX IDX_42C849554ABA19A8 (kilometer_id), INDEX IDX_42C849556BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kilometer (id INT AUTO_INCREMENT NOT NULL, max_km INT NOT NULL, rate DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bill (id INT AUTO_INCREMENT NOT NULL, reservation_id INT DEFAULT NULL, bill VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_7A2119E3B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, model_id INT DEFAULT NULL, status_id INT DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, license_plate VARCHAR(255) DEFAULT NULL, INDEX IDX_1B80E4867975B7E7 (model_id), INDEX IDX_1B80E4866BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, rate DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D92A86559F FOREIGN KEY (classification_id) REFERENCES classification (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554ABA19A8 FOREIGN KEY (kilometer_id) REFERENCES kilometer (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E3B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4867975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4866BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9C54C8C93');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D92A86559F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4867975B7E7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556BF700BD');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4866BF700BD');
        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E3B83297E7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554ABA19A8');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955545317D1');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE pricing');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE kilometer');
        $this->addSql('DROP TABLE bill');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE brand');
    }
}
