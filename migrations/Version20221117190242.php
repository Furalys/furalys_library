<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221117190242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animator (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, username VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_60BF92084B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE illustration (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_D67B9A424B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE illustrator (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, username VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_970F11B74B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, added_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5A8A6C8D12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_7CC7DA2C4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animator ADD CONSTRAINT FK_60BF92084B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A424B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE illustrator ADD CONSTRAINT FK_970F11B74B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animator DROP FOREIGN KEY FK_60BF92084B89032C');
        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A424B89032C');
        $this->addSql('ALTER TABLE illustrator DROP FOREIGN KEY FK_970F11B74B89032C');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D12469DE2');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C4B89032C');
        $this->addSql('DROP TABLE animator');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE illustration');
        $this->addSql('DROP TABLE illustrator');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
