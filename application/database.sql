#the data base schema for the takaful blood bank system
DROP DATABASE takaful;
CREATE DATABASE takaful;
ALTER DATABASE app charset=utf8;
use takaful;

CREATE TABLE user #this table will be general for all types of use
(
	id INTEGER AUTO_INCREMENT PRIMARY KEY , 
	email varchar(150) UNIQUE NOT NULL,
	hashed_password varchar(60) NOT NULL ,  #the hashing algorithm used gives a 60 byte output
	user_order INTEGER # 1 for admin , 2 for normal_user
);

CREATE TABLE doner #here we have to add the application specific information
(
	doner_id INTEGER , 
	full_name varchar(200), 
	image varchar(100) , #the path will be in the image folder like images/profile/[var.ext]
	gender char(1) , 
	phone_number varchar(20),
	alternative_phone varchar(20) ,
	birth_date DATE , 
	blood_group char(5),
	#constrains
	PRIMARY KEY(doner_id) , 
	FOREIGN KEY (doner_id) REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE health_status
(
	doner_id INTEGER , 
	st_date DATE  , 
	description text , 
	#constrains:
	FOREIGN KEY (doner_id) REFERENCES doner(doner_id) ON DELETE CASCADE
);
CREATE TABLE donations
(
	doner_id INTEGER ,
	donation_date DATE , 
	details text , 
	#constrains:
	FOREIGN KEY (doner_id) REFERENCES doner(doner_id) ON DELETE CASCADE
);
#insert admin , pass for password


#views:

CREATE OR REPLACE VIEW health_view AS SELECT max(st_date) as st_date, doner_id  from health_status
 GROUP BY doner_id;

CREATE OR REPLACE VIEW donations_view AS SELECT max(donation_date) , doner_id as donation_date from
donations GROUP BY doner_id;


#-------------------------------------------------------------------------------------------
CREATE OR REPLACE VIEW med AS
SELECT  doner.doner_id , doner.birth_date , doner.full_name , doner.phone_number 
, doner.alternative_phone , doner.image , doner.blood_group , doner.gender , 
donations.donation_date , donations.details ,
  TIMESTAMPDIFF(YEAR, doner.birth_date , CURDATE()) AS age 
FROM doner LEFT JOIN(donations)
ON(doner.doner_id = donations.doner_id);

CREATE OR REPLACE VIEW doners_data AS

SELECT  med.doner_id , med.birth_date , med.full_name , med.phone_number 
, med.alternative_phone , med.image , med.blood_group , med.gender , 
med.donation_date , med.details , med.age , 
health_status.st_date , health_status.description
FROM med LEFT JOIN(health_status)
ON(med.doner_id = health_status.doner_id);

#-------------------------------------------------------------------------------------------

#TIMESTAMPDIFF(YEAR, doner.birth_date , CURDATE()) AS age 

#CREATE OR REPLACE VIEW doners_data AS
#SELECT doner.doner_id , doner.birth_date , doner.full_name , doner.phone_number 
#, doner.alternative_phone , doner.image , doner.blood_group , doner.gender , 
#donations.donation_date , donations.details ,  TIMESTAMPDIFF(YEAR, doner.birth_date , CURDATE()) AS age , 
#health_status.st_date , health_status.description
#FROM doner LEFT JOIN(donations , health_status)
#ON(doner.doner_id = donations.doner_id AND doner.doner_id = health_status.doner_id);


#data base for session purposes:
CREATE TABLE `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);


#data base insertions:

INSERT INTO `user` (`id`, `email`, `hashed_password`, `user_order`) VALUES
(1, 'alnour.ahmed@gmail.com', '$2y$10$ZGxnaz8tZmQuaGtqamdyZuQxkw81Fl80Kbdw9hQTFSmalEsrpjfU.', NULL),
(2, 'alnourah@hotmail.com', '$2y$10$ZGxnaz8tZmQuaGtqamdyZuQxkw81Fl80Kbdw9hQTFSmalEsrpjfU.', NULL),
(3, 'admin@admin.com', '$2y$10$ZGxnaz8tZmQuaGtqamdyZuQxkw81Fl80Kbdw9hQTFSmalEsrpjfU.', 565684);

INSERT INTO `doner` (`doner_id`, `full_name`, `image`, `gender`, `phone_number`, `alternative_phone`, `birth_date`, `blood_group`) VALUES
(1, 'Alnour Ahmed Khalifa', 'fafa.JPG', 'M', '09910082015869', '09910082011', '1992-09-01', 'O+'),
(2, 'Alnour Alharin', NULL, 'M', '0912322512', NULL, '2000-08-01', 'O-'),
(3, 'admin', NULL, 'M', '0912133826', NULL, '2000-08-01', 'O+');


INSERT INTO `donations` (`doner_id`, `donation_date`, `details`) VALUES
(1, '2014-08-02', 'hello all'),
(2, '2014-08-02', 'teeet'),
(2, '2014-08-02', 'kkk'),
(1, '2014-08-02', 'aaaa');



INSERT INTO `health_status` (`doner_id`, `st_date`, `description`) VALUES
(1, '2014-08-02', 'he'),
(1, '2014-08-02', 'hhh'),
(1, '2014-08-02', 'gdfh'),
(1, '2014-08-02', 'gg');

