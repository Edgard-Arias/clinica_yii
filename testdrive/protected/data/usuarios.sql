CREATE TABLE IF NOT EXISTS usuarios(
id          INT          NOT NULL AUTO_INCREMENT,
nombre      VARCHAR(100) NOT NULL,
email    	VARCHAR(100) NOT NULL,
password  	VARCHAR(150) NOT NULL,
sexo          INT  NOT NULL,
codigo_verificacion  	VARCHAR(150) NOT NULL,
activo tinyint NOT NULL DEFAULT '0',
PRYMARY KEY(id)
);