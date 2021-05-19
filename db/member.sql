create table member (
  num int not null auto_increment,
  id char(80) not null,
  pass char(15) not null,
  name char(15) not null,
  email char(80),
  regist_day char(20),
  level char(10) not null,
  point int,
  primary key(num)
) charset=utf8;