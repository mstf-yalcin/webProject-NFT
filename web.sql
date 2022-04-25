create database web;
use web;


create table accountStatus(
id int not null auto_increment primary key,
status varchar(30)
);

  
create table coinType(
id int primary key auto_increment not null,
name varchar(255) not null,
type varchar(100) not null
);


create table users(
userId varchar(100) not null primary key,
first_name varchar(100) not null,
last_name varchar(100) not null,
email varchar(255) not null unique,
bio text,
gender int(1) not null,
pp varchar(255),
cover varchar(255),
password varchar(255) not null,
balance double not null, /* */
created_at datetime,
updated_at datetime,
accountStatus int not null,
likesNft json,
remember_token varchar(255),
orderNotification int(1),/*notification*/
itemsUpdate int(1),/*notification*/
newBid int(1),/*notification*/
constraint fk_accountStatus_id  foreign key (accountStatus) references accountStatus(id)
);

ALTER TABLE users ADD FULLTEXT(first_name,last_name);

 create table bank(
id int primary key auto_increment not null,
userId varchar(100) not null,
balance double not null,
coinType int not null,
constraint fk_users_id  foreign key (userId) references users(userId),
constraint fk_coinType_id  foreign key (coinType) references coinType(id)
);
 
 

create table createNft(
nftId varchar(255) not null primary key,
name varchar(255),
discription text,
createrId varchar(100) not null,
ownerId varchar (100) not null,
amount double,
royality double,
size text,
property varchar(255),
sellStatus int(1),/* 0-1 */
instantSale int(1),
likes json,
created_at datetime,
updated_at datetime,
data varchar(255),
dataType varchar(50),
category varchar(100),
constraint fk_users_userId  foreign key (createrId) references users(userId),
constraint fk_users_owner  foreign key (ownerId) references users(userId) 
/*collection ?*/
);

ALTER TABLE createNft ADD FULLTEXT(name,discription,property);

/*CREATE FULLTEXT INDEX  CreateNft(name,discription,property);*/


create table sellStatus(
id int not null auto_increment primary key,
status varchar(30)
);


create table sellNft(
sellId varchar(100) primary key not null,
nftId varchar(100) not null,
fromAccount varchar(100) ,
toAccount varchar(100),
created_at datetime,
constraint fk_create_nft_sellControl_nftId  foreign key (nftId) references createNft(nftId),
constraint fk_users_fromAccount_userId_sellId foreign key (fromAccount) references users(userId),
constraint fk_users_toAccount_userId_sellId foreign key (toAccount) references users(userId)
);


create table bidNft(
bidId varchar(255) not null primary key,
nftId varchar(255) not null,
bidAccount varchar(100) not null,
bid double not null,
status int not null,
sellId varchar(100),
created_at datetime,
updated_at datetime,
constraint fk_create_nft_nftId  foreign key (nftId) references createNft(nftId),
constraint fk_users_sellNft_userId_bidAccount  foreign key (bidAccount) references users(userId),
constraint fk_sellStatus_id  foreign key (status) references sellStatus(id),
constraint fk_sellNft_sellId  foreign key (sellId) references sellNft(sellId)
);



create table follower(
userId varchar(100) not null,
follow json,
followers json,
constraint fk_users_follower_userId  foreign key (userId) references users(userId)
);

insert into accountStatus (status) values('active'),('pasive'),('delete');
insert into sellStatus (status) values('pending'),('sold'),('refused'),('auto_refused');
insert into coinType (name,type) values('Etherium','ETH'),('Bitcoin','BTC'),('Decentraland','MANA');

 
 create table admin(
 id int primary key auto_increment,
 name varchar(255),
 email varchar(255),
 password varchar(255)
 );
 
/*report*/

/*cotact*/
