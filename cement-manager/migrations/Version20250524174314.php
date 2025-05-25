<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524174314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
            )
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "order" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, stock_id INTEGER NOT NULL, quantity INTEGER NOT NULL, unit_price DOUBLE PRECISION NOT NULL, total_amount DOUBLE PRECISION NOT NULL, order_date DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , status VARCHAR(20) NOT NULL, notes VARCHAR(255) DEFAULT NULL, invoice_number VARCHAR(255) NOT NULL, CONSTRAINT FK_F529939819EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F5299398DCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F529939819EB6921 ON "order" (client_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F5299398DCD6110 ON "order" (stock_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE stock (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cement_type VARCHAR(255) NOT NULL, quantity INTEGER NOT NULL, price_per_unit DOUBLE PRECISION NOT NULL, last_updated DATETIME NOT NULL --(DC2Type:datetime_immutable)
            , description VARCHAR(255) DEFAULT NULL, minimum_threshold INTEGER NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
            , password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE client
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "order"
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE stock
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "user"
        SQL);
    }
}
