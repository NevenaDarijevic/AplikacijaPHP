
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `radnici` (
  `id` varchar(20) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `stepenstrucnespreme` varchar(20) NOT NULL,
  `grad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `radnici` (`id`, `ime`, `prezime`, `stepenstrucnespreme`, `grad`) VALUES
('1', 'Marko', 'Markovic', '3', 'Cacak'),
('2', 'Sofija', 'Markovic', '2', 'Valjevo'),
('3', 'Sasa', 'Stefanovic', '3', 'Gornji Milanovac'),
('4', 'Sandra', 'Filipovic', '1', 'Cacak'),
('5', 'Nebojsa', 'Ilic', '1', 'Valjevo'),
('6', 'Milan', 'Sandric', '3', 'Mionica'),
('6', 'Marina', 'Majic', '3', 'Mionica'),
('7', 'Jelena', 'Nikolic', '3', 'Cacak');



CREATE TABLE `hrzaposleni` (
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `korisnicko_ime` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `hrzaposleni` (`ime`, `prezime`, `email`, `korisnicko_ime`, `lozinka`) VALUES
('Nevena', 'Darijevic', 'darijevicnevena00@gmail.com', 'daria.nevena', 'iteh');


ALTER TABLE `radnici`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `hrzaposleni`
  ADD PRIMARY KEY (`korisnicko_ime`);
COMMIT;

