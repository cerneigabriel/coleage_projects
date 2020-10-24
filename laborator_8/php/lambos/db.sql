CREATE DATABASE lambos;
USE lambos;

CREATE TABLE intrebari (
    id varchar(255) NOT NULL,
    intrebare varchar(255) NOT NULL,
    raspuns varchar(255) NOT NULL,
    PRIMARY KEY (id)
);


INSERT INTO intrebari(id, intrebare, raspuns) VALUES
("q1", "Capitala Moldovei?", "1"),
("q2", "Din ce an Moldova este o tara independenta?", "3"),
("q3", "Ce an este acum?", "2"),
("q4", "Cat este 2+3?", "5"),
("q5", "Chisinau este capitala carei tari?", "Moldova"),
("q6", "Ce an este acum?", "1"),
("q7", "Cat este 10*2?", "3"),
("q8", "Ce an este acum?", "2"),
("q9", "Ce an este acum?", "2"),
("q10", "Ce an este acum?", "2"),
("q12", "Ce an este acum?", "2"),
("q11", "Ce an este acum?", "2"),
("q13", "Ce an este acum?", "2"),
("q14", "Ce an este acum?", "2"),
("q15", "Ce an este acum?", "2"),
("q16", "Ce an este acum?", "2");