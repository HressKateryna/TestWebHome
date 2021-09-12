CREATE TABLE Region (
      id_r     int NOT NULL,
      name     varchar(32)
);


ALTER TABLE Region ADD PRIMARY KEY (id_r);

CREATE TABLE City (
      id_c     int NOT NULL,
      name     varchar(32),
      id_r     int NOT NULL
);

ALTER TABLE City ADD PRIMARY KEY (id_c);



CREATE TABLE Pharmacy (
      id_ph     int NOT NULL,
      number     int,
      id_c     int NOT NULL
);


ALTER TABLE Pharmacy ADD PRIMARY KEY (id_ph);

CREATE TABLE Products (
      id_pr     int NOT NULL,
      name     varchar(32)
);


ALTER TABLE Products ADD PRIMARY KEY (id_pr);


CREATE TABLE Blacklist (
      id_c     int NOT NULL,
      id_pr     int NOT NULL
);

ALTER TABLE Blacklist ADD PRIMARY KEY (id_c,id_pr);

CREATE TABLE PharmProduct (
      id_ph     int NOT NULL,
      id_pr     int NOT NULL
);

ALTER TABLE PharmProduct ADD PRIMARY KEY (id_ph,id_pr);

ALTER TABLE City ADD FOREIGN KEY (id_r) REFERENCES Region (id_r);

ALTER TABLE Pharmacy ADD FOREIGN KEY (id_c) REFERENCES City (id_c);

ALTER TABLE Blacklist ADD FOREIGN KEY (id_c) REFERENCES City (id_c);
ALTER TABLE Blacklist ADD FOREIGN KEY (id_pr) REFERENCES Products (id_pr);


ALTER TABLE PharmProduct ADD FOREIGN KEY (id_ph) REFERENCES Pharmacy (id_ph);
ALTER TABLE PharmProduct ADD FOREIGN KEY (id_pr) REFERENCES Products (id_pr);


