drop database if exists bbs_board;
create database bbs_board;
grant all on bbs_board.* to dbuser@localhost identified by 'hogehoge';
use bbs_board;


drop table if exists users;
create table users(
  id int unsigned auto_increment primary key,
  name varchar(255),
  password varchar(255) not null,
  email varchar(300) not null unique
);

drop table if exists posts;
create table posts(
  id int unsigned primary key auto_increment,
  title varchar(255) not null,
  content varchar(255) not null,
  user_id int unsigned,
  constraint fk_post_users_id foreign key (user_id) references users (id),
  created_at datetime not null default current_timestamp,
  updated_at datetime not null default current_timestamp
);
insert into posts (title, content, user_id) values
  ('テストタイトル1','テストタイトル1のコンテンツです。',1),
  ('テストタイトル2','テストタイトル2のコンテンツです。',2),
  ('テストタイトル3','テストタイトル3のコンテンツです。',3),
  ('テストタイトル4','テストタイトル4のコンテンツです。',4),
  ('テストタイトル5','テストタイトル5のコンテンツです。',3),
  ('テストタイトル6','テストタイトル6のコンテンツです。',4),
  ('テストタイトル7','テストタイトル7のコンテンツです。',1);


drop table if exists comments;
create table comments(
  id int unsigned primary key auto_increment,
  content varchar(255) not null,
  user_id int unsigned not null,
  post_id int unsigned not null,
  created_at datetime,
  updated_at datetime,
  constraint fk_post_comments_id foreign key (post_id) references posts (id),
  constraint fk_user_comments_id foreign key (user_id) references users (id)
);
insert into comments(content, user_id,post_id) values
  ('コメント1',3,1), ('コメント3',4,5), ('コメント2',4,1), ('コメント5',3,2),
  ('コメント5',3,1), ('コメント9',3,5), ('コメント1',2,4), ('コメント5',2,1),
  ('コメント6',1,2), ('コメント8',1,2), ('コメント2',4,1), ('コメント5',2,3),
  ('コメント1',3,1), ('コメント3',4,5), ('コメント2',4,1), ('コメント5',3,2),
  ('コメント5',4,2), ('コメント9',3,5), ('コメント1',2,4), ('コメント5',2,1),
  ('コメント6',3,1), ('コメント8',1,2), ('コメント2',4,1), ('コメント5',2,3);
