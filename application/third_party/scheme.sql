CREATE TABLE IF NOT EXISTS tb_usuario(
    cd_usuario INTEGER PRIMARY KEY AUTO_INCREMENT,
    nm_usuario VARCHAR(50) NOT NULL UNIQUE,
    vl_email VARCHAR(200) NOT NULL UNIQUE,
    vl_password TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS tb_endereco(
    cd_endereco INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
    vl_estado VARCHAR(100) NOT NULL,
    vl_cidade VARCHAR(150) NOT NULL,
    vl_rua TEXT NOT NULL,
    vl_num INTEGER NOT NULL CHECK(vl_num > 0),
    vl_bairro TEXT NOT NULL
);

INSERT INTO tb_usuario (nm_usuario, vl_email, vl_password)
VALUES ("root", "root.ademir@gmail.com", "YWRlbWly");  -- ademir in b64
