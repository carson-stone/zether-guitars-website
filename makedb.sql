CREATE TABLE IF NOT EXISTS users (
  username VARCHAR(12) PRIMARY KEY,
  password VARCHAR(20),
  name VARCHAR(30),
  email VARCHAR(25),
  address VARCHAR(25),
  city VARCHAR(25),
  state CHAR(2),
  zip INT,
  receiveOffers BOOLEAN
);
CREATE TABLE IF NOT EXISTS events (
  name VARCHAR(30),
  sponsor VARCHAR(30),
  date DATE,
  time TIME WITHOUT TIME ZONE,
  ampm CHAR(2),
  description VARCHAR(100)
);
