create table fav(
    num int not null auto_increment,
    id char(80) not null,
    shop_code char(11) not null,
    class_code char(11) not null,
    fav_value int not null,
    primary key(num)
) charset=utf8;