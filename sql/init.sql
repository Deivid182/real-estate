CREATE TABLE `real-estate`.properties (
	id int(11) auto_increment NOT NULL,
	title varchar(45) NULL,
	price DECIMAL(10.2) NULL,
	image varchar(200) NULL,
	description LONGTEXT NULL,
	rooms int(1) NULL,
	wc int(1) NULL,
	parkings int(1) NULL,
	created_at DATE NULL,
	CONSTRAINT properties_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `real-estate`.sellers (
	id int(11) auto_increment NOT NULL,
	first_name varchar(45) NULL,
	last_name DECIMAL(10.2) NULL,
	CONSTRAINT sellers_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;
