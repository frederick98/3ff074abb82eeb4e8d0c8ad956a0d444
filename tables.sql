create table 'users' (
    'id' int(10) not null primary key auto_increment,
    'name' varchar(255) not null,
    'email' varchar(255),
    'phone_number' int(15),
    'username' varchar(255) unique not null,
    'password' varchar(255) not null,
    'created_at' timestamp default current_timestamp(),
    'updated_at' timestamp null default null,
    'deleted_at' timestamp null default null
)

create table 'user_sessions'(
    'id' int(10) not null primary key auto_increment,
    'user_id' int(10) not null,
    'token' varchar(255),
    'token_expired' varchar(255) not null,
    'created_at' timestamp default current_timestamp(),
    'updated_at' timestamp null default null,
    'deleted_at' timestamp null default null
)

create table 'mails' (
    'id' int(10) not null primary key auto_increment,
    'user_id' int(10) not null,
    'messages' text not null,
    'is_sent' boolean,
    'created_at' timestamp default current_timestamp(),
    'updated_at' timestamp null default null,
    'deleted_at' timestamp null default null
)