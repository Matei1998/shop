


-- Ajuta la re-crearea tabelelor (cand deja exista)
DROP TABLE IF EXISTS Furnizori;
DROP TABLE IF EXISTS Componente;
DROP TABLE IF EXISTS Proiecte;
DROP TABLE IF EXISTS Livrari;
-- -------------------------------------------------

CREATE TABLE Furnizori(
 idf VARCHAR(5),
 numef VARCHAR(50) NOT NULL,
 stare DOUBLE, 
 oras VARCHAR(30) NOT NULL);

CREATE TABLE Componente(
 idc VARCHAR(20),
 numec VARCHAR(50) NOT NULL,
 culoare VARCHAR(25),
 masa DOUBLE UNIQUE,
 oras VARCHAR(30) NOT NULL);

CREATE TABLE Proiecte(
 idp VARCHAR(5),
 numep VARCHAR(50) NOT NULL,
 oras VARCHAR(30) NOT NULL);

CREATE TABLE Livrari(
 idf VARCHAR(5),
 idc VARCHAR(5),
 idp VARCHAR(5),
 cantitate DOUBLE NOT NULL,
 um VARCHAR(30));

ALTER TABLE Furnizori
ADD CONSTRAINT furniz_pk PRIMARY KEY(idf);


ALTER TABLE Componente
ADD CONSTRAINT comp_pk PRIMARY KEY(idc);


ALTER TABLE proiecte
ADD CONSTRAINT proiecte_pk PRIMARY KEY(idp);

ALTER TABLE Furnizori 
ADD CONSTRAINT idf_Furnizori CHECK(idf LIKE 'F%');

ALTER TABLE Componente 
ADD CONSTRAINT idc_Componente CHECK(idc LIKE 'C%');

ALTER TABLE Proiecte 
ADD CONSTRAINT idp_Proiecte CHECK(idp LIKE 'P%');

ALTER TABLE Livrari 
ADD CONSTRAINT fk_liv_idf FOREIGN KEY(idf) REFERENCES Furnizori(idf) ON DELETE CASCADE;

ALTER TABLE Livrari 
ADD CONSTRAINT fk_liv_idc FOREIGN KEY(idc) REFERENCES Componente(idc) ON DELETE CASCADE;


ALTER TABLE Livrari 
ADD CONSTRAINT fk_liv_idp FOREIGN KEY(idp) REFERENCES Proiecte(idp) ON DELETE CASCADE;

ALTER TABLE LIVRARI
DROP COLUMN UM;

ALTER TABLE COMPONENTE 
ADD CONSTRAINT F_CULOARE CHECK ( CULOARE IN ('Rosu','Albastru','Galben','Portocaliu','Visiniu','Gri','Verde','Mov','Negru','Alb'));


ALTER TABLE Proiecte
ADD CONSTRAINT CHK_Proiecte_SpecialDej
CHECK (
    NOT (oras = 'Dej' AND numep NOT LIKE '%special%')
);


-- Populare tabela Furnizori

INSERT INTO Furnizori (idf, numef, stare, oras)
VALUES('F1', 'EMAG', 1, 'Cluj-Napoca');
INSERT INTO Furnizori (idf, numef, stare, oras)
VALUES('F2', 'Altex', 2, 'Oradea');
INSERT INTO Furnizori (idf, numef, stare, oras)
VALUES('F3', 'Media Galaxy', 3, 'Galati');
INSERT INTO Furnizori (idf, numef, stare, oras)
VALUES('F4', 'Contakt', 3, 'Satu-Mare');
INSERT INTO Furnizori (idf, numef, stare, oras)
VALUES('F5', 'Orange', 10, 'Constanta');
INSERT INTO Furnizori (idf, numef, stare, oras)
VALUES('F6', 'Automobile Bavaria', 5, 'Brasov');
INSERT INTO Furnizori (idf, numef, stare, oras)
VALUES('F7', 'Audi Dealership', 10, 'Bistrita');
INSERT INTO Furnizori(idf, numef, stare, oras)
VALUES('F001', 'StarAssembly', 100, 'Sebes');


-- Populare tabela Componente


INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C1', 'iPhone 15 Pro', 'Gri', '1', 'ORADEA');
INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C2', 'BMW 320D', 'Negru', '1500', 'Brasov');
INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C3', 'tastatura', 'Negru', '2', 'Galati');
INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C4', 'SMART TV', 'Alb', '4', 'Cluj-Napoca');
INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C5', 'Smartwatch', 'Mov', '0.2', 'Constanta');
INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C6', 'Husa telefon', 'Albastru', '0.05', 'Satu-Mare');
INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C7', 'Fag', 'Verde', '420', 'Cluj-Napoca');
INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C8', 'Audi A8', 'Alb', '2100', 'Bistrita');
INSERT INTO Componente (idc, numec, culoare, masa, oras)
VALUES('C9', 'BMW M550D', 'Albastru','2050','Bistrita');
INSERT INTO Componente(idc, numec, culoare, masa, oras)
VALUES('C0','RoataDintata','Gri','25','Sebes');
INSERT INTO COMPONENTE (idc, numec, culoare, masa, oras)
VALUES ('C12','mousepad','Gri','0.25','Constanta');


-- Populare tabela Proiecte


INSERT INTO Proiecte (idp, numep, oras)
VALUES('P1', 'Marcaje stradale', 'Cluj-Napoca');
INSERT INTO Proiecte (idp, numep, oras)
VALUES('P2', 'Curatare pomi', 'Sibiu');
INSERT INTO Proiecte (idp, numep, oras)
VALUES('P3', 'Reparatie telefoane', 'ORADEA');
INSERT INTO Proiecte (idp, numep, oras)
VALUES('P4', 'Depanare autovehicule', 'Brasov');
INSERT INTO Proiecte (idp, numep, oras)
VALUES('P5', 'Construire imobile', 'Cluj-Napoca');
INSERT INTO Proiecte (idp, numep, oras)
VALUES('P6', 'Reabilitare monumente istorice', 'Constanta');
INSERT INTO Proiecte(idp, numep, oras)
VALUES('P7','Divertisment','Cluj-Napoca');
INSERT INTO Proiecte(idp,numep,oras)
VALUES('P8','Accesorii telefoane','Satu-Mare');
INSERT INTO Proiecte(idp,numep,oras)
VALUES('P9','Gadget-uri','Constanta');
INSERT INTO Proiecte(idp,numep,oras)
VALUES('P10','Autovehicule','Bistrita');
INSERT INTO Proiecte(idp,numep,oras)
VALUES('P11','Mecatronica','Sebes');


-- Populare tabela livrari

INSERT INTO Livrari(idf, idc, idp, cantitate)
VALUES('F1','C1', 'P3', 1);
INSERT INTO Livrari(idf, idc, idp, cantitate)
VALUES('F6','C2', 'P4', 5);
INSERT INTO Livrari(idf, idc, idp, cantitate)
VALUES('F3','C4', 'P9', 2);
INSERT INTO Livrari(idf, idc, idp, cantitate)
VALUES('F2','C5', 'P9', 2);
INSERT INTO Livrari(idf, idc, idp, cantitate)
VALUES('F4','C6', 'P8', 2);
INSERT INTO Livrari(idf, idc, idp, cantitate)
VALUES('F1','C3', 'P9', 1);
INSERT INTO Livrari(idf, idc, idp, cantitate)
VALUES('F7','C8','P10',4);
INSERT INTO LIVRARI(idf, idc, idp, cantitate)
VALUES('F7','C9','P10',15);
INSERT INTO LIVRARI(idf, idc, idp, cantitate)
VALUES('F001','C0','P11',250);
INSERT INTO LIVRARI (idf, idc,idp, cantitate)
VALUES('F2','C12','P9',120);
INSERT INTO LIVRARI (idf, idc, idp, cantitate)
VALUES('F2','C12','P8',150);
