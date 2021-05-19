create table article(
    num int not null auto_increment,
    id char(80) not null,
    name char(20) not null,
    title char(50) not null,
    sub char(150) not null,
    content char(255) not null,
    hit int not null,
    regist_day char(20) not null,
    file_name char(200),
    file_type char(50),
    file_copied char(50),
    primary key(num)
) charset=utf8;