DROP DATABASE IF EXISTS `slim4-rest-api`;
CREATE DATABASE `slim4-rest-api`;
USE `slim4-rest-api`;

CREATE TABLE `employees` (
    `emp_no`      INT             NOT NULL PRIMARY KEY,
    `birth_date`  DATE            NOT NULL,
    `first_name`  VARCHAR(14)     NOT NULL,
    `last_name`   VARCHAR(16)     NOT NULL,
    `gender`      ENUM ('M','F')  NOT NULL,    
    `hire_date`   DATE            NOT NULL
);

INSERT INTO `employees`(`emp_no`, `birth_date`, `first_name`, `last_name`, `gender`, `hire_date`)
VALUES
(10001,'1953-09-02','Georgi','Facello','M','1986-06-26'),
(10002,'1964-06-02','Bezalel','Simmel','F','1985-11-21'),
(10003,'1959-12-03','Parto','Bamford','M','1986-08-28'),
(10004,'1954-05-01','Chirstian','Koblick','M','1986-12-01'),
(10005,'1955-01-21','Kyoichi','Maliniak','M','1989-09-12'),
(10006,'1953-04-20','Anneke','Preusig','F','1989-06-02'),
(10007,'1957-05-23','Tzvetan','Zielinski','F','1989-02-10'),
(10008,'1958-02-19','Saniya','Kalloufi','M','1994-09-15'),
(10009,'1952-04-19','Sumant','Peac','F','1985-02-18'),
(10010,'1963-06-01','Duangkaew','Piveteau','F','1989-08-24'),
(10011,'1953-11-07','Mary','Sluis','F','1990-01-22'),
(10012,'1960-10-04','Patricio','Bridgland','M','1992-12-18'),
(10013,'1963-06-07','Eberhardt','Terkki','M','1985-10-20'),
(10014,'1956-02-12','Berni','Genin','M','1987-03-11'),
(10015,'1959-08-19','Guoxiang','Nooteboom','M','1987-07-02');