<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117145247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart_items (id INT AUTO_INCREMENT NOT NULL, cart_id_id INT DEFAULT NULL, product_id_id INT DEFAULT NULL, INDEX IDX_BEF4844520AEF35F (cart_id_id), INDEX IDX_BEF48445DE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discounts (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, description VARCHAR(255) NOT NULL, discount_percent DOUBLE PRECISION NOT NULL, usage_limit INT NOT NULL, expiration_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, INDEX IDX_F52993989D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_iteam (id INT AUTO_INCREMENT NOT NULL, order_id_id INT DEFAULT NULL, product_id_id INT DEFAULT NULL, INDEX IDX_343AEFDFFCDAEAAA (order_id_id), INDEX IDX_343AEFDFDE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_items (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, total_price DOUBLE PRECISION NOT NULL, tax DOUBLE PRECISION NOT NULL, shipping_cost VARCHAR(255) NOT NULL, status INT NOT NULL, placed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, order_id_id INT DEFAULT NULL, method VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, date DATE NOT NULL, status INT NOT NULL, reviews VARCHAR(255) NOT NULL, INDEX IDX_65D29B32FCDAEAAA (order_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, seller_id_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, sku DOUBLE PRECISION NOT NULL, stock_quantity DOUBLE PRECISION NOT NULL, image_url VARCHAR(255) NOT NULL, INDEX IDX_B3BA5A5ADF4C85EA (seller_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_categories (products_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_E8ACBE766C8A81A9 (products_id), INDEX IDX_E8ACBE76A21214B7 (categories_id), PRIMARY KEY(products_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, product_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, rating INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6970EB0FDE18E50B (product_id_id), INDEX IDX_6970EB0F9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_carts (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, shopping_carts_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone DOUBLE PRECISION NOT NULL, adress VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_1483A5E92A05CA8 (shopping_carts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wishlist_items (id INT AUTO_INCREMENT NOT NULL, wishlist_id_id INT DEFAULT NULL, product_id_id INT DEFAULT NULL, INDEX IDX_B5BB81B52BE1F6AF (wishlist_id_id), INDEX IDX_B5BB81B5DE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wishlists (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, INDEX IDX_4A4C2E1B9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT FK_BEF4844520AEF35F FOREIGN KEY (cart_id_id) REFERENCES shopping_carts (id)');
        $this->addSql('ALTER TABLE cart_items ADD CONSTRAINT FK_BEF48445DE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE order_iteam ADD CONSTRAINT FK_343AEFDFFCDAEAAA FOREIGN KEY (order_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_iteam ADD CONSTRAINT FK_343AEFDFDE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE payments ADD CONSTRAINT FK_65D29B32FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5ADF4C85EA FOREIGN KEY (seller_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE products_categories ADD CONSTRAINT FK_E8ACBE766C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products_categories ADD CONSTRAINT FK_E8ACBE76A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0FDE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E92A05CA8 FOREIGN KEY (shopping_carts_id) REFERENCES shopping_carts (id)');
        $this->addSql('ALTER TABLE wishlist_items ADD CONSTRAINT FK_B5BB81B52BE1F6AF FOREIGN KEY (wishlist_id_id) REFERENCES wishlists (id)');
        $this->addSql('ALTER TABLE wishlist_items ADD CONSTRAINT FK_B5BB81B5DE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE wishlists ADD CONSTRAINT FK_4A4C2E1B9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY FK_BEF4844520AEF35F');
        $this->addSql('ALTER TABLE cart_items DROP FOREIGN KEY FK_BEF48445DE18E50B');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989D86650F');
        $this->addSql('ALTER TABLE order_iteam DROP FOREIGN KEY FK_343AEFDFFCDAEAAA');
        $this->addSql('ALTER TABLE order_iteam DROP FOREIGN KEY FK_343AEFDFDE18E50B');
        $this->addSql('ALTER TABLE payments DROP FOREIGN KEY FK_65D29B32FCDAEAAA');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5ADF4C85EA');
        $this->addSql('ALTER TABLE products_categories DROP FOREIGN KEY FK_E8ACBE766C8A81A9');
        $this->addSql('ALTER TABLE products_categories DROP FOREIGN KEY FK_E8ACBE76A21214B7');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0FDE18E50B');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F9D86650F');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E92A05CA8');
        $this->addSql('ALTER TABLE wishlist_items DROP FOREIGN KEY FK_B5BB81B52BE1F6AF');
        $this->addSql('ALTER TABLE wishlist_items DROP FOREIGN KEY FK_B5BB81B5DE18E50B');
        $this->addSql('ALTER TABLE wishlists DROP FOREIGN KEY FK_4A4C2E1B9D86650F');
        $this->addSql('DROP TABLE cart_items');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE discounts');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_iteam');
        $this->addSql('DROP TABLE order_items');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE payments');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE products_categories');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE shopping_carts');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE wishlist_items');
        $this->addSql('DROP TABLE wishlists');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
