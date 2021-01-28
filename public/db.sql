use apinewspapers;

create table theme(
id int primary key auto_increment,
name varchar(50));

create table news(
id int primary key auto_increment,
title varchar(200),
article varchar(2000),
image varchar(100),
theme int,
create_at date,
update_at date,
name varchar(50),
inicio char(1) default 'N',
foreign key(theme) references theme(id));
