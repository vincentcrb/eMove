<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180804105605 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_100285584827B9B2');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D4827B9B2');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DAC14B70A');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, hour_rate DOUBLE PRECISION DEFAULT NULL, kilometer_rate DOUBLE PRECISION DEFAULT NULL, INDEX IDX_D79572D944F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `range` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, hour_rate DOUBLE PRECISION DEFAULT NULL, kilometer_rate DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bill (id INT AUTO_INCREMENT NOT NULL, reservation_id INT DEFAULT NULL, bill VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_7A2119E3B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, model_id INT DEFAULT NULL, status_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, serial_number VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, license_plate VARCHAR(255) DEFAULT NULL, kilometers DOUBLE PRECISION DEFAULT NULL, purchase_date DATE DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_1B80E48644F5D008 (brand_id), INDEX IDX_1B80E4867975B7E7 (model_id), INDEX IDX_1B80E4866BF700BD (status_id), INDEX IDX_1B80E486B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E3B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48644F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4867975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4866BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE gamme');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE tarif');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('ALTER TABLE status CHANGE nom name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD date_start DATETIME DEFAULT NULL, ADD date_end DATETIME DEFAULT NULL, DROP date_debut, DROP date_fin, CHANGE prix price DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4867975B7E7');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48644F5D008');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, reservation_id INT DEFAULT NULL, facture VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_FE866410B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, coeff_heure DOUBLE PRECISION DEFAULT NULL, coeff_kilometre DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, coeff_heure DOUBLE PRECISION DEFAULT NULL, coeff_kilometre DOUBLE PRECISION DEFAULT NULL, INDEX IDX_100285584827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif (id INT AUTO_INCREMENT NOT NULL, periode VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, prix_heure DOUBLE PRECISION DEFAULT NULL, prix_kilometre DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, coeff_heure DOUBLE PRECISION DEFAULT NULL, coeff_kilometre DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, modele_id INT DEFAULT NULL, status_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, numero_serie VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, couleur VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, immatriculation VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, kilometrage DOUBLE PRECISION DEFAULT NULL, date_achat DATE DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, INDEX IDX_292FFF1D4827B9B2 (marque_id), INDEX IDX_292FFF1DAC14B70A (modele_id), INDEX IDX_292FFF1D6BF700BD (status_id), INDEX IDX_292FFF1DB83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE `range`');
        $this->addSql('DROP TABLE bill');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE brand');
        $this->addSql('ALTER TABLE reservation ADD date_debut DATETIME DEFAULT NULL, ADD date_fin DATETIME DEFAULT NULL, DROP date_start, DROP date_end, CHANGE price prix DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE status CHANGE name nom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
