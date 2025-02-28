<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250228090501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book_state (id INT AUTO_INCREMENT NOT NULL, state VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE img (id INT AUTO_INCREMENT NOT NULL, book_id INT DEFAULT NULL, img_path VARCHAR(255) NOT NULL, img_alt VARCHAR(255) NOT NULL, INDEX IDX_BBC2C8AC16A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pro (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, company_name VARCHAR(255) NOT NULL, company_adress VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_6BB4D6FFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE img ADD CONSTRAINT FK_BBC2C8AC16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE pro ADD CONSTRAINT FK_6BB4D6FFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE book ADD seller_id INT NOT NULL, ADD book_state_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3318DE820D9 FOREIGN KEY (seller_id) REFERENCES pro (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3311C272A98 FOREIGN KEY (book_state_id) REFERENCES book_state (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3318DE820D9 ON book (seller_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A3311C272A98 ON book (book_state_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3311C272A98');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3318DE820D9');
        $this->addSql('ALTER TABLE img DROP FOREIGN KEY FK_BBC2C8AC16A2B381');
        $this->addSql('ALTER TABLE pro DROP FOREIGN KEY FK_6BB4D6FFA76ED395');
        $this->addSql('DROP TABLE book_state');
        $this->addSql('DROP TABLE img');
        $this->addSql('DROP TABLE pro');
        $this->addSql('DROP INDEX IDX_CBE5A3318DE820D9 ON book');
        $this->addSql('DROP INDEX IDX_CBE5A3311C272A98 ON book');
        $this->addSql('ALTER TABLE book DROP seller_id, DROP book_state_id');
    }
}
