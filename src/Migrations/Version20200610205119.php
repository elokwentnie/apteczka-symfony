<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610205119 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ListaLekow DROP FOREIGN KEY ListaLekow_ibfk_3');
        $this->addSql('ALTER TABLE ListaLekow DROP FOREIGN KEY ListaLekow_ibfk_2');
        $this->addSql('DROP TABLE ListaLekowFirmawPL');
        $this->addSql('DROP TABLE ListaLekowPodmiotOdpow');
        $this->addSql('ALTER TABLE ListaLekow DROP FOREIGN KEY ListaLekow_ibfk_1');
        $this->addSql('ALTER TABLE ListaLekow CHANGE NazwaHandlowa NazwaHandlowa VARCHAR(120) DEFAULT \'\'\'\'\'\', CHANGE Postac Postac VARCHAR(32) DEFAULT \'\'\'\'\'\', CHANGE Dawka Dawka VARCHAR(42) DEFAULT \'\'\'\'\'\', CHANGE Opakowanie Opakowanie VARCHAR(42) DEFAULT \'\'\'\'\'\', CHANGE BAZYL BAZYL VARCHAR(6) DEFAULT \'\'\'\'\'\', CHANGE KodKreskowy KodKreskowy VARCHAR(14) DEFAULT \'\'\'\'\'\', CHANGE ATC_WHO ATC_WHO VARCHAR(5) DEFAULT \'\'\'\'\'\', CHANGE NazwaMiedzynarodowa NazwaMiedzynarodowa VARCHAR(40) DEFAULT \'\'\'\'\'\', CHANGE Odpowiedniki Odpowiedniki VARCHAR(128) DEFAULT \'\'\'\'\'\', CHANGE SynonimFarmaceutyczny SynonimFarmaceutyczny VARCHAR(129) DEFAULT \'\'\'\'\'\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ListaLekowFirmawPL (id_FirmawPL INT AUTO_INCREMENT NOT NULL, FirmawPolsce VARCHAR(128) CHARACTER SET utf8 NOT NULL COLLATE `utf8_polish_ci`, Adres VARCHAR(67) CHARACTER SET utf8 NOT NULL COLLATE `utf8_polish_ci`, Telefon VARCHAR(101) CHARACTER SET utf8 NOT NULL COLLATE `utf8_polish_ci`, NIP VARCHAR(10) CHARACTER SET utf8 NOT NULL COLLATE `utf8_polish_ci`, REGON VARCHAR(14) CHARACTER SET utf8 NOT NULL COLLATE `utf8_polish_ci`, WWW VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_polish_ci`, Email VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_polish_ci`, PRIMARY KEY(id_FirmawPL)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ListaLekowPodmiotOdpow (id_PodmiotOdpow INT AUTO_INCREMENT NOT NULL, PodmiotOdpowiedzialny VARCHAR(79) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id_PodmiotOdpow)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE listalekow CHANGE NazwaHandlowa NazwaHandlowa VARCHAR(120) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE Postac Postac VARCHAR(32) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE Dawka Dawka VARCHAR(42) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE Opakowanie Opakowanie VARCHAR(42) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE BAZYL BAZYL VARCHAR(6) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE KodKreskowy KodKreskowy VARCHAR(14) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE ATC_WHO ATC_WHO VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE NazwaMiedzynarodowa NazwaMiedzynarodowa VARCHAR(40) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE Odpowiedniki Odpowiedniki VARCHAR(128) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, CHANGE SynonimFarmaceutyczny SynonimFarmaceutyczny VARCHAR(129) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE listalekow ADD CONSTRAINT ListaLekow_ibfk_1 FOREIGN KEY (id_status) REFERENCES ListaLekowStatus (id_status) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE listalekow ADD CONSTRAINT ListaLekow_ibfk_2 FOREIGN KEY (id_PodmiotOdpow) REFERENCES ListaLekowPodmiotOdpow (id_PodmiotOdpow) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE listalekow ADD CONSTRAINT ListaLekow_ibfk_3 FOREIGN KEY (id_FirmawPL) REFERENCES ListaLekowFirmawPL (id_FirmawPL) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
