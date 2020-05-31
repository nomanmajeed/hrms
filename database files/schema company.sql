create database company;

use company;

create table role(
role_id int unique not null auto_increment,
role_name char(10) not null,
primary Key (role_id)
);

create table country(
country_id int unique not null,
country_name char(100) not null,
primary key(country_id)
);

create table city(
city_id int unique not null auto_increment,
city_name char(100) not null,
country_id int not null,
primary key(city_id),
foreign key(country_id) references country(country_id)
);

create table users(
user_id int unique not null auto_increment,
user_role int,
user_name char(50) not null,
user_cnic varchar(13) not null,
user_email varchar(50) not null,
user_phone varchar(11) not null,
user_gender char(6) not null,
user_dob varchar(10) not null,
user_address varchar(300) not null,
user_city int not null,
user_country int not null,
user_password char(15),
user_image_name varchar(255),
user_image_url varchar(255),
primary key(user_id),
foreign key(user_role) references role(role_id),
foreign key(user_city) references city(city_id),
foreign key(user_country) references country(country_id)
);

create table qualification(
qualification_id int not null unique auto_increment,
user_id int not null,
degree_level varchar(50) not null,
degree_title char(100) not null,
major_subjects varchar(500) not null,
college_name varchar(200) not null,
date_enrollment varchar(10) not null,
date_completion varchar(10) not null,
grade varchar(2) not null,
primary key(qualification_id),
foreign key(user_id) references users(user_id)
);

create table bank(
bank_id int not null unique auto_increment,
user_id int not null,
bank_name char(100) not null,
branch_no varchar(4) not null,
branch_name char(100) not null,
account_no varchar(20) not null,
primary key(bank_id),
foreign key(user_id) references users(user_id)
);

create table designation(
designation_id int unique not null auto_increment,
designation_name char(50) not null,
primary key(designation_id)
);

create table project(
project_id int unique not null auto_increment,
project_name char(50) not null,
primary key(project_id)
);

create table department(
department_id int unique not null auto_increment,
department_name char(50) not null,
primary key(department_id)
);

create table location(
location_id int unique not null auto_increment,
location_name char(100) not null,
primary key(location_id)
);

create table user_job(
user_id int not null,
user_designation int not null,
user_project int not null,
user_department int not null,
user_location int not null,
user_date_hire varchar(10) not null,
foreign key(user_id) references users(user_id),
foreign key(user_designation) references designation(designation_id),
foreign key(user_project) references project(project_id),
foreign key(user_department) references department(department_id),
foreign key(user_location) references location(location_id)
);

create table user_salary(
user_id int not null,
total_salary varchar(7),
basic_salary varchar(7),
travelling_allounce varchar(7),
house_allounce varchar(7),
medical_allounce varchar(7),
lunch_allounce varchar(7),
foreign key(user_id) references users(user_id)
);