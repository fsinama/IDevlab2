<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407215126 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ryb_Report (id INT AUTO_INCREMENT NOT NULL, technology_id INT DEFAULT NULL, author_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, cause VARCHAR(500) NOT NULL, solution VARCHAR(255) DEFAULT NULL, state TINYINT(1) NOT NULL, open_at DATETIME NOT NULL, claused_at DATETIME DEFAULT NULL, INDEX IDX_7824A5D44235D463 (technology_id), INDEX IDX_7824A5D4F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ryb_Report_Type (report_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_AFABA5604BD2A4C0 (report_id), INDEX IDX_AFABA560C54C8C93 (type_id), PRIMARY KEY(report_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ryb_Technology (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ryb_Type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(40) NOT NULL, mail VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ryb_Report ADD CONSTRAINT FK_7824A5D44235D463 FOREIGN KEY (technology_id) REFERENCES ryb_Technology (id)');
        $this->addSql('ALTER TABLE ryb_Report ADD CONSTRAINT FK_7824A5D4F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ryb_Report_Type ADD CONSTRAINT FK_AFABA5604BD2A4C0 FOREIGN KEY (report_id) REFERENCES ryb_Report (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ryb_Report_Type ADD CONSTRAINT FK_AFABA560C54C8C93 FOREIGN KEY (type_id) REFERENCES ryb_Type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ryb_Report_Type DROP FOREIGN KEY FK_AFABA5604BD2A4C0');
        $this->addSql('ALTER TABLE ryb_Report DROP FOREIGN KEY FK_7824A5D44235D463');
        $this->addSql('ALTER TABLE ryb_Report_Type DROP FOREIGN KEY FK_AFABA560C54C8C93');
        $this->addSql('ALTER TABLE ryb_Report DROP FOREIGN KEY FK_7824A5D4F675F31B');
        $this->addSql('DROP TABLE ryb_Report');
        $this->addSql('DROP TABLE ryb_Report_Type');
        $this->addSql('DROP TABLE ryb_Technology');
        $this->addSql('DROP TABLE ryb_Type');
        $this->addSql('DROP TABLE user');
    }
}
