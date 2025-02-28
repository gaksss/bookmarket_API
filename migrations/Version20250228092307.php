<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250228092307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fav (id INT AUTO_INCREMENT NOT NULL, book_id INT DEFAULT NULL, add_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_769BE06F16A2B381 (book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fav_user (fav_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_95888E971C69F07B (fav_id), INDEX IDX_95888E97A76ED395 (user_id), PRIMARY KEY(fav_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, book_id INT DEFAULT NULL, user_id INT DEFAULT NULL, pro_id INT DEFAULT NULL, purchased_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_6B81704416A2B381 (book_id), INDEX IDX_6B817044A76ED395 (user_id), INDEX IDX_6B817044C3B7E4BA (pro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fav ADD CONSTRAINT FK_769BE06F16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE fav_user ADD CONSTRAINT FK_95888E971C69F07B FOREIGN KEY (fav_id) REFERENCES fav (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fav_user ADD CONSTRAINT FK_95888E97A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B81704416A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B817044A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B817044C3B7E4BA FOREIGN KEY (pro_id) REFERENCES pro (id)');
        $this->addSql('ALTER TABLE user ADD lastname VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) DEFAULT NULL, ADD pp_path VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fav DROP FOREIGN KEY FK_769BE06F16A2B381');
        $this->addSql('ALTER TABLE fav_user DROP FOREIGN KEY FK_95888E971C69F07B');
        $this->addSql('ALTER TABLE fav_user DROP FOREIGN KEY FK_95888E97A76ED395');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B81704416A2B381');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B817044A76ED395');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B817044C3B7E4BA');
        $this->addSql('DROP TABLE fav');
        $this->addSql('DROP TABLE fav_user');
        $this->addSql('DROP TABLE sales');
        $this->addSql('ALTER TABLE user DROP lastname, DROP firstname, DROP phone, DROP pp_path');
    }
}
