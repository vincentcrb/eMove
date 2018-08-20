<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180820122825 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE kilometer (id INT AUTO_INCREMENT NOT NULL, max_km INT NOT NULL, rate DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE type ADD rate DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE classification ADD rate DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE birthDate birthDate DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE model ADD starting_price INT DEFAULT NULL, DROP hour_rate, DROP kilometer_rate');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849556BF700BD');
        $this->addSql('DROP INDEX IDX_42C849556BF700BD ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE date_start date_start DATE DEFAULT NULL, CHANGE date_end date_end DATE DEFAULT NULL, CHANGE status_id kilometer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554ABA19A8 FOREIGN KEY (kilometer_id) REFERENCES kilometer (id)');
        $this->addSql('CREATE INDEX IDX_42C849554ABA19A8 ON reservation (kilometer_id)');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4866BF700BD');
        $this->addSql('DROP INDEX IDX_1B80E4866BF700BD ON vehicle');
        $this->addSql('ALTER TABLE vehicle ADD isDispo TINYINT(1) DEFAULT NULL, DROP status_id, DROP serial_number');
        $this->addSql('ALTER TABLE brand ADD rate DOUBLE PRECISION DEFAULT NULL, DROP image');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554ABA19A8');
        $this->addSql('DROP TABLE kilometer');
        $this->addSql('ALTER TABLE brand ADD image VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP rate');
        $this->addSql('ALTER TABLE classification DROP rate');
        $this->addSql('ALTER TABLE model ADD hour_rate DOUBLE PRECISION DEFAULT NULL, ADD kilometer_rate DOUBLE PRECISION DEFAULT NULL, DROP starting_price');
        $this->addSql('DROP INDEX IDX_42C849554ABA19A8 ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE date_start date_start DATETIME DEFAULT NULL, CHANGE date_end date_end DATETIME DEFAULT NULL, CHANGE kilometer_id status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849556BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_42C849556BF700BD ON reservation (status_id)');
        $this->addSql('ALTER TABLE type DROP rate');
        $this->addSql('ALTER TABLE user CHANGE birthDate birthDate DATE NOT NULL');
        $this->addSql('ALTER TABLE vehicle ADD status_id INT DEFAULT NULL, ADD serial_number VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP isDispo');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4866BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_1B80E4866BF700BD ON vehicle (status_id)');
    }
}
