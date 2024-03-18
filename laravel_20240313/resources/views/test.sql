<<<<<<< HEAD
CREATE TABLE `laravel_db`.`test2` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(100) NOT NULL COMMENT '姓名', 
`num` INT(10) NOT NULL , `date` DATE NOT NULL COMMENT '數量' , 
`date` date DEFAULT NULL COMMENT '日期'
PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `laravel_db`.`cat` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(100) NOT NULL COMMENT '姓名', 
`num` INT(10) NOT NULL , `date` DATE NOT NULL COMMENT '數量' , 
`date` date DEFAULT NULL COMMENT '日期'
PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `laravel_db`.`dog` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(100) NOT NULL COMMENT '姓名', 
`num` INT(10) NOT NULL , `date` DATE NOT NULL COMMENT '數量' , 
`date` date DEFAULT NULL COMMENT '日期'
PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `laravel_db`.`pig` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(100) NOT NULL COMMENT '姓名', 
`num` INT(10) NOT NULL , `date` DATE NOT NULL COMMENT '數量' , 
`date` date DEFAULT NULL COMMENT '日期'
PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `laravel_db`.`fish` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(100) NOT NULL COMMENT '姓名', 
`num` INT(10) NOT NULL , `date` DATE NOT NULL COMMENT '數量' , 
`date` date DEFAULT NULL COMMENT '日期'
PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;
=======
INSERT INTO
    `cats` (
        `id`,
        `name`,
        `mobile`,
        `created_at`,
        `updated_at`,
        `address`
    )
VALUES
    (NULL, 'bob', '0922', NULL, NULL, '2'),
    (NULL, 'cat', '0933', NULL, NULL, '3'),
    (NULL, 'dog', '0944', NULL, NULL, '4'),
    (NULL, 'fox', '0955', NULL, NULL, '5'),
    (NULL, 'egg', '0966', NULL, NULL, '6');

>>>>>>> ae23fb728d8a270fcc325281fb171787e8689b31
