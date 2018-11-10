-- ************************************** `user_categories`

CREATE TABLE `user_categories`
(
	`category_id`   int NOT NULL AUTO_INCREMENT ,
	`category_name` varchar(45) NOT NULL ,
	PRIMARY KEY (`category_id`)
);

-- ************************************** `persons`

CREATE TABLE `persons`
(
	`person_id`   int NOT NULL AUTO_INCREMENT ,
	`category_id` int NOT NULL ,
	`name`        varchar(45) NOT NULL ,
	`lastname`    varchar(45) NOT NULL ,
	`email`       varchar(45) NOT NULL ,
	`telefon`     varchar(45) NOT NULL ,
	`username`    varchar(45) NOT NULL ,
	`password`    varchar(45) NOT NULL ,
	PRIMARY KEY (`person_id`),
	FOREIGN KEY (`category_id`) REFERENCES `user_categories`
);

-- ************************************** `companies`

CREATE TABLE `companies`
(
	`company_id`  int NOT NULL AUTO_INCREMENT ,
	`category_id` int NOT NULL ,
	`name`        varchar(45) NOT NULL ,
	`username`    varchar(45) NOT NULL ,
	`password`    varchar(45) NOT NULL ,
	PRIMARY KEY (`company_id`),
	FOREIGN KEY (`category_id`) REFERENCES `user_categories`
);

-- ************************************** `suppliers`

CREATE TABLE `suppliers`
(
	`supplier_id` int NOT NULL AUTO_INCREMENT ,
	`company_id`  int NOT NULL ,
	PRIMARY KEY (`supplier_id`),
	FOREIGN KEY (`company_id`) REFERENCES `companies`
);

-- ************************************** `factories`

CREATE TABLE `factories`
(
	`factory_id` int NOT NULL AUTO_INCREMENT ,
	`company_id` int NOT NULL ,
	PRIMARY KEY (`factory_id`),
	FOREIGN KEY (`company_id`) REFERENCES `companies`
);

-- ************************************** `customers`

CREATE TABLE `customers`
(
	`customer_id` int NOT NULL AUTO_INCREMENT ,
	`person_id`   int NOT NULL ,
	PRIMARY KEY (`customer_id`),
	FOREIGN KEY (`person_id`) REFERENCES `persons` 
);






