<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923121745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project_category (project_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_3B02921A166D1F9C (project_id), INDEX IDX_3B02921A12469DE2 (category_id), PRIMARY KEY(project_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_category ADD CONSTRAINT FK_3B02921A166D1F9C FOREIGN KEY (project_id) REFERENCES portfolio_projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_category ADD CONSTRAINT FK_3B02921A12469DE2 FOREIGN KEY (category_id) REFERENCES portfolio_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE portfolio_projects DROP FOREIGN KEY FK_2019E93C12469DE2');
        $this->addSql('DROP INDEX IDX_2019E93C12469DE2 ON portfolio_projects');
        $this->addSql('ALTER TABLE portfolio_projects DROP category_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE project_category');
        $this->addSql('ALTER TABLE portfolio_projects ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE portfolio_projects ADD CONSTRAINT FK_2019E93C12469DE2 FOREIGN KEY (category_id) REFERENCES portfolio_categories (id)');
        $this->addSql('CREATE INDEX IDX_2019E93C12469DE2 ON portfolio_projects (category_id)');
    }
}
