create table cart(
  num int not null auto_increment,
  id char(80) not null,
  shop_code char(20) not null,
  class_code char(20) not null,
  price int not null,
  primary key(num)
) charset=utf8;