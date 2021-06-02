-- members
insert into members (firstname, lastname, birthdate, origin) values (
    'Dirk', 'Nowitzki', '1978-6-19', 'Germany'
);
insert into members (firstname, lastname, birthdate, origin, hof) values (
    'Kobe', 'Bryant', '1978-8-23', 'USA', true
);

insert into members (firstname, lastname, birthdate, origin, hof) values(
    'Phil', 'Jackson', '1945-9-17', 'USA', true
);

-- players
insert into players (member_id, position, height, weight, gender) values (
    1, 6, 213, 111, 1
);
insert into players (member_id, position, height, weight, gender) values (
    2, 3, 198, 96, 1
);
insert into players (member_id, position, height, weight, gender) values (
    3, 2, 203, 100, 1
);

-- coaches
insert into coaches (member_id) values (3);

