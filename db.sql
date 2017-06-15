create table users(
u_id int(255) auto_increment primary key,
u_name varchar(50) not null,
u_nick varchar(25) not null,
u_pass varchar(40) not null,
u_email varchar(50) not null,
u_type enum('0','1', '2') not null default '2',
u_lastlogin timestamp not null default current_timestamp,
UNIQUE KEY (u_nick),
UNIQUE KEY (u_email),
INDEX u_loggedout_index(u_loggedout),
INDEX u_lastlogin_index(u_lastlogin),
INDEX u_type_index(u_type),
INDEX u_name_index(u_name)
)Engine=InnoDB default charset utf8;


create table sections(
sec_id int(255) auto_increment primary key,
sec_logo varchar(50) not null default '--',
sec_name varchar(50) not null,
sec_user int(255) not null,
sec_date varchar(50) not null,
Foreign key (sec_user) references users(u_id),
INDEX sec_name_index(sec_name),
INDEX sec_id_index(sec_id),
INDEX sec_date_index(sec_date),
INDEX sec_logo_index(sec_logo)
)Engine=InnoDB default charset utf8;


create table articles(
acl_id int(255) auto_increment primary key,
acl_section int(255) not null,
acl_title varchar(50) not null,
acl_lang varchar(25) not null,
acl_img varchar(255) not null,
acl_content text,
acl_date varchar(15) not null,
acl_realdate timestamp not null default current_timestamp,
acl_user int(255) not null,
Foreign key (acl_section) references sections(sec_id),
Foreign key (acl_user) references users(u_id),
INDEX acl_realdate_index(acl_realdate),
INDEX acl_date_index(acl_date),
INDEX acl_img_index(acl_img),
INDEX acl_lang_index(acl_lang),
INDEX acl_title_index(acl_title),
INDEX acl_id_index(acl_id)
)Engine=InnoDB default charset utf8;


create table slider(
sl_id int(255) auto_increment primary key,
sl_img varchar(255) not null default '-',
sl_content varchar(255) not null default '---',
sl_url varchar(255) not null default '#',
sl_date timestamp not null default current_timestamp,
sl_user int(255) not null,
Foreign key (sl_user) references users(u_id),
INDEX sl_date_index(sl_date),
INDEX sl_url_index(sl_url),
INDEX sl_content_index(sl_content),
INDEX sl_img_index(sl_img),
INDEX sl_id_index(sl_id)
)Engine=InnoDB default charset utf8;
