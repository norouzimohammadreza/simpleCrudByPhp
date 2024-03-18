CREATE TABLE `users`(
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(55) NOT NULL,
    `lastname` VARCHAR(55) NOT NULL,
    `email` VARCHAR(55) NOT NULL,
    `phone` INT(11) NOT NULL,
    `createdtime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    `address` VARCHAR(455) NOT NULL
)ENGINE innoDB DEFAULT CHARSET = utf8 COLLATE=utf8_persian_ci;

ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

ALTER Table `users`
Modify `id` INT(11) NOT NULL AUTO_INCREMENT;
COMMIT; 
