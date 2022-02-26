CREATE TABLE Book (
    isbn varchar(13),
    title  varchar(200) NOT NUL,
    author varchar(150) NOT NUL,
    overview text,
    picture BLOB,
    read_count INT DEFAULT 0
);

