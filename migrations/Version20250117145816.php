<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117145816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_items ADD order_id_id INT DEFAULT NULL, ADD product_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_items ADD CONSTRAINT FK_62809DB0DE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_62809DB0FCDAEAAA ON order_items (order_id_id)');
        $this->addSql('CREATE INDEX IDX_62809DB0DE18E50B ON order_items (product_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0FCDAEAAA');
        $this->addSql('ALTER TABLE order_items DROP FOREIGN KEY FK_62809DB0DE18E50B');
        $this->addSql('DROP INDEX IDX_62809DB0FCDAEAAA ON order_items');
        $this->addSql('DROP INDEX IDX_62809DB0DE18E50B ON order_items');
        $this->addSql('ALTER TABLE order_items DROP order_id_id, DROP product_id_id');
    }
}
