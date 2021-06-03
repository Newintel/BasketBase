use Basket;

-- members
insert into members (firstname, lastname, birthdate, origin, hof, dead, active) values
('Dirk', 'Nowitzki', '1978-6-19', 'Germany', false, false, false),
( 'Kobe', 'Bryant', '1978-8-23', 'USA', true, true, false),
('Phil', 'Jackson', '1945-9-17', 'USA', true, false, false);

-- players
insert into players (member_id, position, height, weight, gender) values
(1, 6, 213, 111, 1),
(2, 3, 198, 96, 1),
(3, 2, 203, 100, 1);

-- coaches
insert into coaches (member_id) values (3);

-- awards
insert into awards (name, fullname) values
('MVP', 'Most Valuable Player'),
('DPOY', 'Defensive Player of the Year'),
('6MOY', 'Sixth Man of the Year'),
('ROY', 'Rookie of the Year'),
('MIP', 'Most Improved Player'),
('COY', 'Coach of the Year');

-- leagues
insert into leagues (name, shortname, region) values
('National Basketball Association', 'NBA', 'North America');

-- teams
insert into teams (name, shortname, city, country) values
('Mavericks', 'DAL', 'Dallas', 'USA'),
('Lakers', 'LAL', 'Los Angeles', 'USA');

-- team_league
insert into team_league (league, team) values
(1, 1),
(1, 2);

-- wins
insert into wins (league, team, season) values
(1, 1, 2011),
(1, 2, 2020),
(1, 2, 2010);

