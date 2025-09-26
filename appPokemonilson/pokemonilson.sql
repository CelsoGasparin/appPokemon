create database pokemonilson;
use pokemonilson;




create table pokemons (

	id int auto_increment not null,
    nome varchar(45) not null,
    lvl int not null,
    sprite text not null,
    hp int not null,
    attack int not null,	
    defense int not null,
	spAttack int not null,
    spDefense int not null,
    speed int not null,
    ivHp int not null,
    ivAttack int not null,
    ivDefense int not null,
    ivSpAttack int not null,
    ivSpDefense int not null,
    ivSpeed int not null,
    tipo1 int not null,
    tipo2 int,
    idRegiao int not null,
    constraint pk_pokemon primary key(id),
    foreign key(tipo1) references tipos(id),
    foreign key(tipo2) references tipos(id),
    foreign key(idRegiao) references regioes(id)
);


create table tipos(
	id int auto_increment not null,
    nome varchar(20) not null,
    attack varchar(100),
    defense varchar(100),
    constraint pk_tipo primary key(id)
);

create table regioes (
	id int auto_increment not null,
    nome varchar(30),
    constraint pk_regiao primary key(id)
);

INSERT INTO regioes (nome) VALUES
('Kanto'),
('Johto'),
('Hoenn'),
('Sinnoh'),
('Unova'),
('Kalos'),
('Alola'),
('Galar'),
('Hisui'),
('Paldea');


select * from regioes;



INSERT INTO tipos (nome, attack, defense) VALUES
('Normal', '13-0.5-17-0.5-14-0', '7-2-14-0'),
('Fire', '4-2-6-2-12-2-17-2-2-0.5-3-0.5-13-0.5-15-0.5', '3-2-13-2-5-2-2-0.5-4-0.5-6-0.5-12-0.5-17-0.5-18-0.5'),
('Water', '2-2-9-2-13-2-3-0.5-4-0.5-15-0.5', '4-2-5-2-3-0.5-2-0.5-6-0.5-17-0.5'),
('Grass', '3-2-9-2-13-2-2-0.5-4-0.5-8-0.5-10-0.5-12-0.5-15-0.5-17-0.5', '2-2-8-2-10-2-12-2-6-2-3-0.5-4-0.5-5-0.5-9-0.5'),
('Electric', '3-2-10-2-5-0.5-4-0.5-15-0.5-9-0', '9-2-5-0.5-10-0.5-17-0.5'),
('Ice', '4-2-9-2-10-2-15-2-2-0.5-3-0.5-6-0.5-17-0.5', '2-2-7-2-13-2-17-2-6-0.5'),
('Fighting', '1-2-6-2-13-2-16-2-17-2-8-0.5-10-0.5-11-0.5-12-0.5-18-0.5-14-0', '10-2-11-2-18-2-12-0.5-13-0.5-16-0.5'),
('Poison', '4-2-18-2-8-0.5-9-0.5-13-0.5-14-0.5-17-0', '9-2-11-2-4-0.5-7-0.5-8-0.5-12-0.5-18-0.5'),
('Ground', '2-2-5-2-8-2-13-2-17-2-4-0.5-12-0.5-10-0', '3-2-4-2-6-2-8-0.5-13-0.5-5-0'),
('Flying', '4-2-7-2-12-2-5-0.5-13-0.5-17-0.5', '5-2-6-2-13-2-4-0.5-7-0.5-12-0.5-9-0'),
('Psychic', '7-2-8-2-11-0.5-17-0.5-16-0', '12-2-14-2-16-2-7-0.5-11-0.5'),
('Bug', '4-2-11-2-16-2-2-0.5-7-0.5-8-0.5-10-0.5-14-0.5-17-0.5-18-0.5', '2-2-10-2-13-2-4-0.5-7-0.5-9-0.5'),
('Rock', '2-2-6-2-10-2-12-2-7-0.5-9-0.5-17-0.5', '3-2-4-2-7-2-9-2-17-2-1-0.5-2-0.5-8-0.5-10-0.5'),
('Ghost', '11-2-14-2-16-0.5-1-0', '14-2-16-2-8-0.5-12-0.5-1-0-7-0'),
('Dragon', '15-2-17-0.5-18-0', '6-2-15-2-18-2-2-0.5-3-0.5-4-0.5-5-0.5'),
('Dark', '11-2-14-2-7-0.5-16-0.5-18-0.5', '7-2-12-2-18-2-14-0.5-16-0.5-11-0'),
('Steel', '6-2-13-2-18-2-2-0.5-3-0.5-5-0.5-17-0.5', '2-2-7-2-9-2-1-0.5-4-0.5-6-0.5-10-0.5-11-0.5-12-0.5-13-0.5-15-0.5-17-0.5-18-0.5-8-0'),
('Fairy', '7-2-15-2-16-2-2-0.5-8-0.5-17-0.5', '8-2-17-2-7-0.5-12-0.5-16-0.5-15-0');


select * from tipos;


