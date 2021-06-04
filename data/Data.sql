use Basket;

-- members
insert into members (firstname, lastname, birthdate, origin, hof, dead, active) values
('Dirk', 'Nowitzki', '1978-6-19', 'Germany', false, false, false),
( 'Kobe', 'Bryant', '1978-8-23', 'USA', true, true, false),
('Phil', 'Jackson', '1945-9-17', 'USA', true, false, false);

-- players
insert into players (member_id, position, height, weight, gender, retired) values
(1, 6, 213, 111, 1, 2019),
(2, 3, 198, 96, 1, 2016),
(3, 2, 203, 100, 1, 1980);

-- coaches
insert into coaches (member_id, retired) values (3, 2011);

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
('Rockets', 'HOU', 'Houston', 'USA'),
('Grizzlies', 'MEM', 'Memphis', 'USA'),
('Pelicans', 'NOP', 'New Orleans', 'USA'),
('Spurs', 'SAS', 'San Antonio', 'USA'),
('Warriors', 'GSW', 'Golden State', 'USA'),
('Clippers', 'LAC', 'Los Angeles', 'USA'),
('Lakers', 'LAL', 'Los Angeles', 'USA'),
('Suns', 'PHX', 'Phoenix', 'USA'),
('Kings', 'SAC', 'Sacramento', 'USA'),
('Nuggets', 'DEN', 'Denver', 'USA'),
('Timberwolves', 'MIN', 'Minnesota', 'USA'),
('Thunder', 'OKC', 'Oklahoma City', 'USA'),
('Trail Blazers', 'POR', 'Portland', 'USA'),
('Jazz', 'UTA', 'Utah', 'USA'),
('Hawks', 'ATL', 'Atlanta', 'USA'),
('Hornets', 'CHA', 'Charlotte', 'USA'),
('Heat', 'MIA', 'Miami', 'USA'),
('Magic', 'ORL', 'Orlando', 'USA'),
('Wizards', 'WAS', 'Washington', 'USA'),
('Bulls', 'CHI', 'Chicago', 'USA'),
('Cavaliers', 'CLE', 'Cleveland', 'USA'),
('Pistons', 'DET', 'Detroit', 'USA'),
('Pacers', 'IND', 'Indiana', 'USA'),
('Bucks', 'MIL', 'Milwaukee', 'USA'),
('Celtics', 'BOS', 'Boston', 'USA'),
('Nets', 'BKN', 'Brooklyn', 'USA'),
('Knicks', 'NYK', 'New York', 'USA'),
('76ers', 'PHI', 'Philadelphia', 'USA'),
('Raptors', 'TOR', 'Toronto', 'USA');

-- league team
insert into league_team (league, team) values
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30);

-- wins
insert into wins (league, team, season) values
(1, 8, 1999),
(1, 8, 2000),
(1, 8, 2001),
(1, 5, 2002),
(1, 23, 2003),
(1, 5, 2004),
(1, 18, 2005),
(1, 5, 2006),
(1, 26, 2007),
(1, 8, 2008),
(1, 8, 2009),
(1, 1, 2010),
(1, 18, 2011),
(1, 18, 2012),
(1, 5, 2013),
(1, 6, 2014),
(1, 22, 2015),
(1, 6, 2016),
(1, 6, 2017),
(1, 30, 2018),
(1, 8, 2019);


-- plays in
insert into plays_in (player, team, from_season, to_season) values
(1, 1, 1998, 2018),
(2, 8, 1996, 2015),
(3, 28, 1967, 1977),
(3, 27, 1978, 1979);

-- coaches in
insert into coaches_in (coach, team, from_season, to_season) values
(1, 27, 1978, 1980),
(1, 21, 1987, 1997),
(1, 8, 1999, 2003),
(1, 8, 2005, 2010);

-- wins_award
insert into wins_award (member, league, award, season) values
(1, 1, 1, 2007),
(2, 1, 1, 2008),
(3, 1, 6, 1996);