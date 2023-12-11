-- Schema product_dashboard
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `product_dashboard` DEFAULT CHARACTER SET utf8 ;
USE `product_dashboard` ;

-- -----------------------------------------------------
-- Table `product_dashboard`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `product_dashboard`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `product_dashboard`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `product_dashboard`.`products` (
  `product_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  `price` INT NOT NULL,
  `sold` SMALLINT NOT NULL,
  `stock` SMALLINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`product_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `product_dashboard`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `product_dashboard`.`comments` (
  `comment_id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `comment` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`comment_id`),
  INDEX `fk_comments_users_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_comments_products1_idx` (`product_id` ASC) VISIBLE,
  CONSTRAINT `fk_comments_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `product_dashboard`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `product_dashboard`.`products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `product_dashboard`.`replies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `product_dashboard`.`replies` (
  `reply_id` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `comment_id` INT NOT NULL,
  `reply` VARCHAR(255) NOT NULL,
  `created_at` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`reply_id`),
  INDEX `fk_replies_comments1_idx` (`comment_id` ASC) VISIBLE,
  INDEX `fk_replies_users1_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_replies_products1_idx` (`product_id` ASC) VISIBLE,
  CONSTRAINT `fk_replies_comments1`
    FOREIGN KEY (`comment_id`)
    REFERENCES `product_dashboard`.`comments` (`comment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_replies_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `product_dashboard`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_replies_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `product_dashboard`.`products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;