# crudApp_15_11_task

you will need a xamp mysql database to run this:
just run the following sql commands on phpmyadmin:

-> `CREATE DATABASE crud_15_11;`

-> `CREATE TABLE fans (
    id int auto_increment not null,
    username varchar(30) not null,
    password varchar(30) not null,
    email varchar(50) unique not null,
    fav_supe varchar(50) not null,
    PRIMARY KEY(id)
  );`

