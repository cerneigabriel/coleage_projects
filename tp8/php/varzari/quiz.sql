CREATE DATABASE quiz_varzari;
USE quiz_varzari;

CREATE TABLE input_types (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE questions (
    id int NOT NULL AUTO_INCREMENT,
    question varchar(500) NOT NULL,
    input_type_id int NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE answers (
    id int NOT NULL AUTO_INCREMENT,
    question_id int NOT NULL,
    answer varchar(255) NOT NULL,
    is_right int NOT NULL,
    PRIMARY KEY (id)
);

ALTER TABLE questions
ADD FOREIGN KEY (input_type_id)
    REFERENCES quiz_varzari.input_types(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE answers
ADD FOREIGN KEY (question_id)
    REFERENCES quiz_varzari.questions(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE;

INSERT INTO input_types(name) VALUES
("select"),
("radio"),
("check");

INSERT INTO questions(question, input_type_id) VALUES
("Se permite circulaţia (exploatarea) pe drumul public a autovehiculului cu instalaţia de iluminare defectată?", 1),
("Autovehiculele şi remorcile pot circula pe drumurile publice dacă:", 2),
("Când se interzice exploatarea vehiculelor dacă aţi depistat defecţiuni la sistemul de frânare?", 3),
("Se interzice deplasarea ulterioară a vehiculelor dacă:", 3),
("Care este înălţimea reziduală minimă permisă a profilului benzii de rulare a pneurilor autoturismului?", 1),
("Este permisă montarea altui dispozitiv de semnalizare sonoră decât cel revăzut prin construcţie de către proprietarul autovehiculului?", 2);

INSERT INTO answers(question_id, answer, is_right) VALUES
(1, "da", 0),
(1, "da, deoarece drumul pe care se circulă este iluminat", 0),
(1, "nu", 1),

(2, "corespund actelor normative privind siguranţa traficului rutier", 1),
(2, "au un aspect exterior plăcut", 0),
(2, "au o greutate mai mare, decât masa maximă autorizată", 0),

(3, "nu funcţionează semnalul de control al frânei de mână", 0),
(3, "este defectat sau eficienţa acestuia nu corespunde cerinţelor standardelor în vigoare", 1),
(3, "este mic jocul pedalei frânei", 0),
(3, "este modificată construcţia sistemului de frânare, subansamblurile sau piesele nu corespund modelului vehiculului în cauză, precum şi exigenţelor întreprinderii producătoare", 1),

(4, "nu funcţionează farurile şi lanternele de gabarit din spate", 0),
(4, "nu funcţionează sistemul de direcţie", 1),
(4, "nu funcţionează dispozitivele de ştergere, de spălare şi dezaburire a parbrizului din partea conducătorului", 0),
(4, "nu funcţionează frâna de serviciu şi/sau autovehiculul prezintă scurgeri de carburanţi", 1),

(5, "0,8 mm", 0),
(5, "1,0 mm", 0),
(5, "1,6 mm", 1),
(5, "2,0 mm", 0),

(6, "nu", 1),
(6, "da", 0);