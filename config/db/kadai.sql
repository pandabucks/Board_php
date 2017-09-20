drop database if exists bbs_board1;
create database bbs_board1;
grant all on bbs_board1.* to dbuser@localhost identified by 'hogehoge';
use bbs_board1;


drop table if exists engineers;
create table engineers(
  id int auto_increment primary key,
  name varchar(20),
  age int
);