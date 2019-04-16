CREATE TABLE pacjent(
  id int not null primary key auto_increment,
  imie varchar(30) not null,
  nazwisko varchar(40) not null,
  pesel integer(11) not null,
  haslo varchar(100) not null
);

CREATE TABLE zabieg(
  id int not null primary key auto_increment,
  nazwa varchar(30) not null,
  koszt decimal not null,
  refundacja boolean DEFAULT false
);

CREATE TABLE badanie(
  id int not null primary key auto_increment,
  nazwa varchar(30) not null,
  koszt decimal not null,
  refundacja boolean not null DEFAULT 0
);

CREATE TABLE lekarz(
  id int not null primary key auto_increment,
  imie varchar(30) not null,
  nazwisko varchar(40) not null,
  login varchar(40) not null,
  haslo varchar(50) not null
);

CREATE TABLE placowka(
  id int not null primary key auto_increment,
  nazwa varchar(50) not null
);

CREATE TABLE historia_leczenia(
  id int not null primary key auto_increment,
  pacjent_id int null,
  szpital_lekarz_id int null,
  badanie_id int null,
  zabieg_id int null,
  opis text,
  data datetime not null,
  FOREIGN KEY(pacjent_id) REFERENCES pacjent(id) ON DELETE SET NULL,
  FOREIGN KEY(szpital_lekarz_id) REFERENCES szpital_lekarz(id) ON DELETE SET NULL,
  FOREIGN KEY(badanie_id) REFERENCES badanie(id) ON DELETE SET NULL,
  FOREIGN KEY(zabieg_id) REFERENCES zabieg(id) ON DELETE SET NULL
);

CREATE TABLE szpital_lekarz(
  id int not null primary key auto_increment,
  placowka_id int null,
  lekarz_id int null,
  FOREIGN KEY(placowka_id) REFERENCES placowka(id) ON DELETE SET NULL,
  FOREIGN KEY(lekarz_id) REFERENCES lekarz(id) ON DELETE SET NULL
);




