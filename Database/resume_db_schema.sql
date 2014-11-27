create table `activity`(
`activity` varchar(140) primary key
)engine=innodb charset=utf8;
 
create table `skill`(
`skill` varchar(140) primary key
)engine=innodb charset=utf8;
 
create table `phone`(
`phone` varchar(15) primary key
)engine=innodb charset=utf8;
 
create table `location`(
`id` serial primary key,
`address` varchar(140),
`city` varchar(140),
`state` varchar(140),
`country` varchar(140),
unique key(`address`,`city`,`state`,`country`)
)engine=innodb charset=utf8;
 
create table `education`(
`id` serial primary key,
`school` varchar(140) not null,
`year_start` date,
`year_end` date,
`major` varchar(140),
`degree` varchar(140)
)engine=innodb charset=utf8;
 
create table `experience`(
`id` serial primary key,
`employer` varchar(140),
`position` varchar(140),
`description` text,
`contact` varchar(140),
`location` bigint unsigned,
`phone` varchar(15),
foreign key(`location`) references `location`(`id`)
on update cascade on delete cascade,
foreign key(`phone`) references `phone`(`phone`)
on update cascade on delete cascade
)engine=innodb charset=utf8;
 
create table `resume`(
`id` serial primary key,
`name` varchar(140) not null,
`phone` varchar(15),
`location` bigint unsigned,
foreign key(`phone`) references `phone`(`phone`)
on update cascade on delete cascade,
foreign key(`location`) references `location`(`id`)
on update cascade on delete cascade
)engine=innodb charset=utf8;
 
create table `resume_skill`(
`resume` bigint unsigned not null,
`skill` varchar(140) not null,
primary key(`resume`,`skill`),
foreign key(`resume`) references `resume`(`id`)
on update cascade on delete cascade,
foreign key(`skill`) references `skill`(`skill`)
on update cascade on delete cascade
)engine=innodb charset=utf8;
 
create table `resume_experience`(
`resume` bigint unsigned not null,
`experience` bigint unsigned not null,
primary key(`resume`,`experience`),
foreign key(`resume`) references `resume`(`id`)
on update cascade on delete cascade,
foreign key(`experience`) references `experience`(`id`)
on update cascade on delete cascade
)engine=innodb charset=utf8;
 
create table `resume_education`(
`resume` bigint unsigned not null,
`education` bigint unsigned not null,
primary key(`resume`,`education`),
foreign key(`resume`) references `resume`(`id`)
on update cascade on delete cascade,
foreign key(`education`) references `education`(`id`)
on update cascade on delete cascade
)engine=innodb charset=utf8;