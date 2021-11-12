# Php_moyenne readme
Ne pas oublier de générer la base de donnée, et de modifier les informations dans connectDB.php

# Générer la BDD
```SQL
create table if not exists eleve
(
	id int auto_increment
		primary key,
	name varchar(255) not null
);

create table if not exists note
(
	id int auto_increment,
	value int not null,
	eleve_id int not null,
	constraint note_id_uindex
		unique (id)
);

alter table note
	add primary key (id);
```