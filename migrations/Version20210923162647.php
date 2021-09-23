<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923162647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project_features DROP FOREIGN KEY FK_828E57C8CEC89005');
        $this->addSql('DROP TABLE features');
        $this->addSql('DROP TABLE project_features');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE features (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE project_features (project_id INT NOT NULL, features_id INT NOT NULL, INDEX IDX_828E57C8166D1F9C (project_id), INDEX IDX_828E57C8CEC89005 (features_id), PRIMARY KEY(project_id, features_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE project_features ADD CONSTRAINT FK_828E57C8166D1F9C FOREIGN KEY (project_id) REFERENCES portfolio_projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_features ADD CONSTRAINT FK_828E57C8CEC89005 FOREIGN KEY (features_id) REFERENCES features (id) ON DELETE CASCADE');
    }
}
