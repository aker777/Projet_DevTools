CREATE TABLE Book (
    isbn varchar(13) PRIMARY KEY,
    title  varchar(200) NOT NULL,
    author varchar(150) NOT NULL,
    overview text,
    picture LONGBLOB,
    read_count INT DEFAULT 0
);

