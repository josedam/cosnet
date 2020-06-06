
CREATE TABLE  `cosnet`.`lqcpto` (
  `idlqcpto` int(11) NOT NULL AUTO_INCREMENT,
  `deno` char(30) DEFAULT NULL,
  `crub` int(11) DEFAULT NULL,
  `obse` char(30) DEFAULT NULL,
  `acm_dgi` char(1) DEFAULT NULL,
  `gen_ddor` char(1) DEFAULT NULL,
  `bcond` char(120) DEFAULT NULL,
  `acm` char(100) DEFAULT NULL,
  `lecop` double DEFAULT NULL,
  PRIMARY KEY (`idlqcpto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
