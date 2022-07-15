
create database BKSNet;
use BKSNet;

create table Student(
    mssv varchar(20) not null primary key
);

create table admin(
    ttk varchar(20) not null primary key
);

create table User(
    ttk varchar(20) not null primary key,
    ho varchar(10) not null,
    dem varchar(50),
    ten varchar(10) not null
);

create table Account(
    ttk varchar(20) not null primary key,
    mk varchar(20) not null,
    role varchar(20) not null
);

create table Profile(
    mssv varchar(20) not null primary key,
    email varchar(50) not null,
    gender varchar(10),
    dateofbirth datetime,
    address varchar(50),
    decription varchar(1000),
    grade varchar(10),
    school varchar(100),
    major varchar(100)
);

create table Announce(
    id int not null primary key auto_increment,
    ttk varchar(20) not null,
    type varchar(20) not null,
    subject varchar(20),
    verb varchar(50),
    object varchar(20),
    time datetime,
    decription varchar(100),
    foreign key (ttk) references User(ttk),
    foreign key (subject) references User(ttk)
);

create table Friend(
    ttk1 varchar(20) not null,
    ttk2 varchar(20) not null,
    time datetime,
    constraint primary key (ttk1, ttk2),
    foreign key (ttk1) references User(ttk),
    foreign key (ttk2) references User(ttk)
);

create table Follow(
    ttk1 varchar(20) not null,
    ttk2 varchar(20) not null,
    time datetime,
    constraint primary key (ttk1, ttk2),
    foreign key (ttk1) references User(ttk),
    foreign key (ttk2) references User(ttk)
);

create table FriendRequest(
    id int not null primary key auto_increment,
    sender varchar(20) not null,
    receiver varchar(20) not null,
    time datetime,
    foreign key (sender) references User(ttk),
    foreign key (receiver) references User(ttk)  
);

create table Team(
    id int primary key not null auto_increment,
    name varchar(50) not null,
    create_time datetime
);

create table User_Team(
    ttk varchar(20) not null,
    teamid int not null,
    role varchar(20),
    time datetime,
    constraint primary key(ttk, teamid),
    foreign key (ttk) references User(ttk),
    foreign key (teamid) references Team(id)
);

create table TeamRequest(
    ttk varchar(20) not null,
    teamid int not null,
    time datetime,
    constraint primary key(ttk, teamid),
    foreign key (ttk) references User(ttk),
    foreign key (teamid) references Team(id)
);

create table Post(
    id int not null auto_increment primary key,
    ttk varchar(20) not null,
    caption varchar(10000),
    filepath varchar(1000),
    time datetime, 
    access varchar(20),
    teamid int,
    foreign key (ttk) references User(ttk),
    foreign key (teamid) references Team(id)
);

create table Tuongtac(
    id int auto_increment not null primary key,
    ttk varchar(10) not null,
    postid int not null,
    time datetime,
    type varchar(20),
    content varchar(1000),
    foreign key (ttk) references User(ttk),
    foreign key (postid) references Post(id)
);

create table Chat(
    id int not null primary key auto_increment,
    name varchar(50),
    time datetime
);

create table User_Chat(
    ttk varchar(20) not null,
    chatid int not null,
    role varchar(20),
    nickname varchar(50),
    join_time datetime,
    lastseen_time datetime,
    constraint primary key (ttk, chatid),
    foreign key (ttk) references User(ttk),
    foreign key (chatid) references Chat(id)
);

create table Message(
    id int not null auto_increment primary key,
    ttk varchar(20) not null,
    chatid int not null,
    content varchar(10000),
    filepath varchar(1000),
    time datetime,
    foreign key (ttk) references User(ttk),
    foreign key (chatid) references Chat(id)
);

drop database bksnet;
