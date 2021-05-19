create table notice (
   num int not null auto_increment,
   id char(80) not null,
   name char(10) not null,
   subject char(255) not null,
   content text not null,        
   regist_day char(20) not null,
   hit int not null,
   file_name char(40),
   file_type char(40),
   file_copied char(40),
   note int not null,
   level char(10),
   primary key(num)
) charset=utf8;