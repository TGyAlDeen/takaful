#data base file

ALTER DATABASE u737869271_app charset=utf8;
use u737869271_app;

CREATE TABLE user
(
	user_id INTEGER AUTO_INCREMENT PRIMARY KEY, 
	user_name VARCHAR(30), #should be changed so that can be used for log-in
	full_name VARCHAR(200) UNIQUE NOT NULL,
	password VARCHAR(30) UNIQUE, #should be hashed
	aurherity_level INTEGER  #this will define the autherity level of the user
);

CREATE TABLE class(
	id INTEGER AUTO_INCREMENT PRIMARY KEY , 
	degree INTEGER , 
	name varchar(30) UNIQUE
	); #

CREATE TABLE student(s_id INTEGER PRIMARY KEY, 
                     img varchar(256) , 
                     class_id INTEGER , #now leave it as it is in the commited version
                     year INTEGER , #the year of joining school of this student
                     #constrains
                     FOREIGN KEY (s_id) REFERENCES user(user_id) ON DELETE CASCADE , 
                     FOREIGN KEY (class_id) REFERENCES class(id) ON DELETE CASCADE
                     );

#any further information can be added to this table--
#===============================================================================
CREATE TABLE subject
(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	name varchar(30) UNIQUE #can be edited later
);
CREATE TABLE marks
(
	student_id INTEGER , 
	term INTEGER NOT NULL ,
	sub_id INTEGER ,
	year INTEGER , 
	mark INTEGER , 
	class_id INTEGER , 
	#constrains
	PRIMARY KEY(student_id , term , sub_id , year , class_id),
	FOREIGN KEY (sub_id) REFERENCES subject(id) ON DELETE CASCADE,
	FOREIGN KEY (student_id) REFERENCES user(user_id) ON DELETE CASCADE, 
	FOREIGN KEY (class_id) REFERENCES class(id) ON DELETE CASCADE
);
CREATE TABLE comments
(
	id INTEGER AUTO_INCREMENT PRIMARY KEY , 
	comment_date DATE ,
	title varchar(100) , 
	comment_details text 
);
#this table is made for results only 
CREATE TABLE result_comments
(
	comment_id INTEGER AUTO_INCREMENT PRIMARY KEY,
	student_id INTEGER , 
	result_year INTEGER , 
	result_term INTEGER ,
	class_id INTEGER , 
	FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE, 
	FOREIGN KEY (student_id) REFERENCES student(s_id) ON DELETE CASCADE, 
	FOREIGN KEY(class_id) REFERENCES class(id) ON DELETE CASCADE
);
CREATE TABLE attendance
(
	student_id INTEGER , 
	attend_date DATE , 
	excuse text , 
	PRIMARY KEY(student_id , attend_date) , 
	FOREIGN KEY(student_id) REFERENCES student(s_id) ON DELETE CASCADE
);

#Rosoom  Subsystem database

CREATE TABLE hizma
(
	id INTEGER AUTO_INCREMENT PRIMARY KEY, 
	name varchar(100)
);


CREATE TABLE total_money(
	std_id INTEGER PRIMARY KEY, 
	total_amount INTEGER , 
	paid_amount INTEGER ,
	hizma_id INTEGER , 
	FOREIGN KEY (std_id) REFERENCES student(s_id) ON DELETE CASCADE , 
	FOREIGN KEY (hizma_id) REFERENCES hizma(id) ON DELETE CASCADE
);


CREATE TABLE gast
(
	hizma_id INTEGER , 
	gast_date DATE ,
	gast_amount INTEGER , 
	FOREIGN KEY (hizma_id) REFERENCES hizma(id) ON DELETE CASCADE
);

CREATE TABLE payments
(
	std_id INTEGER , 
	amount INTEGER ,
	isal_id varchar(100) ,
	pay_date DATE ,
	comment text , 
	FOREIGN KEY (std_id) REFERENCES student(s_id) ON DELETE CASCADE
);


#HElPER TABLES 
CREATE TABLE uniqueness (id INTEGER AUTO_INCREMENT PRIMARY KEY); #to inforce uniquesness
CREATE TABLE cash(id INTEGER PRIMARY KEY , class INTEGER , term INTEGER , year INTEGER , class_name varchar(100));
insert INTO cash values(1,1,1,1 , ""); #to be unique
CREATE TABLE test(name text);
insert into user(user_name , full_name , password , aurherity_level) 
	values('admin' , 'Admin' , 'pass' , 2); #the main of the page

