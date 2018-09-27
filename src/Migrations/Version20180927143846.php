<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180927143846 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE chateau (id INT AUTO_INCREMENT NOT NULL, territoire_id INT NOT NULL, troupes_id INT DEFAULT NULL, ville VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, niveau INT NOT NULL, revenu_or INT NOT NULL, capital TINYINT(1) NOT NULL, revenu_troupe INT NOT NULL, position_x INT NOT NULL, position_y INT NOT NULL, data_id VARCHAR(255) NOT NULL, INDEX IDX_910FBB99D0F97A8 (territoire_id), INDEX IDX_910FBB99CF9C0DF0 (troupes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chateau_joueur (chateau_id INT NOT NULL, joueur_id INT NOT NULL, INDEX IDX_89B38F0F30D2C3C (chateau_id), INDEX IDX_89B38F0FA9E2D76C (joueur_id), PRIMARY KEY(chateau_id, joueur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE droit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE droit_rang (droit_id INT NOT NULL, rang_id INT NOT NULL, INDEX IDX_784DF0115AA93370 (droit_id), INDEX IDX_784DF0113CC0D837 (rang_id), PRIMARY KEY(droit_id, rang_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, territoire_id INT DEFAULT NULL, rang_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nb_or INT NOT NULL, position_x INT NOT NULL, position_y INT NOT NULL, data_id VARCHAR(255) NOT NULL, type INT NOT NULL, couleur VARCHAR(255) NOT NULL, INDEX IDX_FD71A9C5D0F97A8 (territoire_id), INDEX IDX_FD71A9C53CC0D837 (rang_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_joueur (joueur_source INT NOT NULL, joueur_target INT NOT NULL, INDEX IDX_14CAB949B6316FFF (joueur_source), INDEX IDX_14CAB949AFD43F70 (joueur_target), PRIMARY KEY(joueur_source, joueur_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rang (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE territoire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, data_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE troupe (id INT AUTO_INCREMENT NOT NULL, joueur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, nombre INT NOT NULL, INDEX IDX_81FBFC14A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chateau ADD CONSTRAINT FK_910FBB99D0F97A8 FOREIGN KEY (territoire_id) REFERENCES territoire (id)');
        $this->addSql('ALTER TABLE chateau ADD CONSTRAINT FK_910FBB99CF9C0DF0 FOREIGN KEY (troupes_id) REFERENCES troupe (id)');
        $this->addSql('ALTER TABLE chateau_joueur ADD CONSTRAINT FK_89B38F0F30D2C3C FOREIGN KEY (chateau_id) REFERENCES chateau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chateau_joueur ADD CONSTRAINT FK_89B38F0FA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE droit_rang ADD CONSTRAINT FK_784DF0115AA93370 FOREIGN KEY (droit_id) REFERENCES droit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE droit_rang ADD CONSTRAINT FK_784DF0113CC0D837 FOREIGN KEY (rang_id) REFERENCES rang (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5D0F97A8 FOREIGN KEY (territoire_id) REFERENCES territoire (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C53CC0D837 FOREIGN KEY (rang_id) REFERENCES rang (id)');
        $this->addSql('ALTER TABLE joueur_joueur ADD CONSTRAINT FK_14CAB949B6316FFF FOREIGN KEY (joueur_source) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_joueur ADD CONSTRAINT FK_14CAB949AFD43F70 FOREIGN KEY (joueur_target) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE troupe ADD CONSTRAINT FK_81FBFC14A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE chateau_joueur DROP FOREIGN KEY FK_89B38F0F30D2C3C');
        $this->addSql('ALTER TABLE droit_rang DROP FOREIGN KEY FK_784DF0115AA93370');
        $this->addSql('ALTER TABLE chateau_joueur DROP FOREIGN KEY FK_89B38F0FA9E2D76C');
        $this->addSql('ALTER TABLE joueur_joueur DROP FOREIGN KEY FK_14CAB949B6316FFF');
        $this->addSql('ALTER TABLE joueur_joueur DROP FOREIGN KEY FK_14CAB949AFD43F70');
        $this->addSql('ALTER TABLE troupe DROP FOREIGN KEY FK_81FBFC14A9E2D76C');
        $this->addSql('ALTER TABLE droit_rang DROP FOREIGN KEY FK_784DF0113CC0D837');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C53CC0D837');
        $this->addSql('ALTER TABLE chateau DROP FOREIGN KEY FK_910FBB99D0F97A8');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5D0F97A8');
        $this->addSql('ALTER TABLE chateau DROP FOREIGN KEY FK_910FBB99CF9C0DF0');
        $this->addSql('DROP TABLE chateau');
        $this->addSql('DROP TABLE chateau_joueur');
        $this->addSql('DROP TABLE droit');
        $this->addSql('DROP TABLE droit_rang');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE joueur_joueur');
        $this->addSql('DROP TABLE rang');
        $this->addSql('DROP TABLE territoire');
        $this->addSql('DROP TABLE troupe');
    }
}
