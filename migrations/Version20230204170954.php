<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230204170954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE servant_info (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, servant_id INT NOT NULL, level INT NOT NULL, skill1 INT NOT NULL, skill2 INT NOT NULL, skill3 INT NOT NULL, bond INT NOT NULL, np INT NOT NULL, date_obtention DATE NOT NULL, INDEX IDX_7F722EF0A76ED395 (user_id), INDEX IDX_7F722EF0113ADFC0 (servant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE servant_info ADD CONSTRAINT FK_7F722EF0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE servant_info ADD CONSTRAINT FK_7F722EF0113ADFC0 FOREIGN KEY (servant_id) REFERENCES servant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE servant_info DROP FOREIGN KEY FK_7F722EF0A76ED395');
        $this->addSql('ALTER TABLE servant_info DROP FOREIGN KEY FK_7F722EF0113ADFC0');
        $this->addSql('DROP TABLE servant_info');
    }
}
