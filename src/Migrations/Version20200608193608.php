<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200608193608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE apteczka (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nazwa VARCHAR(255) NOT NULL, INDEX IDX_98234E44A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE listalek (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, slowniklekow_id INT NOT NULL, datawaznosci DATE NOT NULL, ilosc INT NOT NULL, INDEX IDX_7D11DFDBA76ED395 (user_id), INDEX IDX_7D11DFDBA69E0A6F (slowniklekow_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apteczka ADD CONSTRAINT FK_98234E44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE listalek ADD CONSTRAINT FK_7D11DFDBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE listalek ADD CONSTRAINT FK_7D11DFDBA69E0A6F FOREIGN KEY (slowniklekow_id) REFERENCES listalekow (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE apteczka');
        $this->addSql('DROP TABLE listalek');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
