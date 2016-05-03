
Create Database dropdrive_db;
use dropdrive_db;

create table user_tbl(user_id varchar(32) primary key,
                      password varchar(32) not null,
					  fname varchar(32) not null,
					  lname varchar(32) not null
					  );
					  
create table user_email_tbl(user_id varchar(32) primary key REFERENCES user_tbl(user_id),
                            user_email varchar(32) not null);

create table uploader_tbl(user_id varchar(32) primary key REFERENCES user_tbl(user_id),
                          num_uploaded int not null);
						  
create table user_payment_tbl(user_id varchar(32) primary key references user_tbl(user_id),
                              name_OC varchar(32) not null,
							  card_num int(16) not null,
							  expiration char(5) not null,
							  cvv char(3) not null);
							  
create table file_tbl(user_id varchar(32) not null,
                      fileName varchar(32) not null,
					  last_access date,
					  upload_date date not null,
					  public_flag binary(1),
					  primary key (user_id, fileName),
					  foreign key (user_id) references user_tbl(user_id)
					  on delete cascade
					  on update cascade);
					  
create table file_accessors_tbl(user_id varchar(32) not null references user_tbl(user_id)  on delete cascade on update cascade,
                       fileName varchar(32) not null references file_tbl(fileName)  on delete cascade on update cascade,
					   accessor varchar(32) not null,
					   primary key (user_id, fileName)
					   );
								
create table video_file_tbl(user_id varchar(32) not null references user_tbl(user_id) on delete cascade on update cascade,
                       fileName varchar(32) not null references file_tbl(fileName)  on delete cascade on update cascade,
					   duration int not null,
					   primary key (user_id, fileName)
					   );
					   
create table text_file_tbl(user_id varchar(32) not null references user_tbl(user_id)  on delete cascade on update cascade,
                       fileName varchar(32) not null references file_tbl(fileName) on delete cascade on update cascade,
					   file_format char(3) not null,
					   primary key (user_id, fileName)
					   );
					   
create table uploaded_by_tbl(user_id varchar(32) not null references user_tbl(user_id)  on delete cascade on update cascade,
                       fileName varchar(32) not null references file_tbl(fileName) on delete cascade on update cascade,
					   primary key (user_id, fileName)
					   );
							 
create table favorited_by_tbl(user_id varchar(32) not null references user_tbl(user_id)  on delete cascade on update cascade,
                       fileName varchar(32) not null references file_tbl(fileName) on delete cascade on update cascade,
					   primary key (user_id, fileName)
					   );
							 

create table downloaded_by_tbl(user_id varchar(32) not null references user_tbl(user_id) on delete cascade on update cascade,
                       fileName varchar(32) not null references file_tbl(fileName)  on delete cascade on update cascade,
					   primary key (user_id, fileName)
					   );