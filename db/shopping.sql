create table shopping(
    num int not null auto_increment,
    id char(80) not null,
    name char(20) not null,
    brand char(50) not null,
    product char(150) not null,
    content char(255) not null,
    price int not null,
    fav int not null,
    hit int not null,
    regist_day char(20) not null,
    file_name char(200),
    file_type char(50),
    file_copied char(50),
    category char(50),
    tag char(50),
    primary key(num)
) charset=utf8;