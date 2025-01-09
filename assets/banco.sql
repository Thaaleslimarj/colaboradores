CREATE TABLE usuarios (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    nome VARCHAR(255) NOT NULL,  
    login VARCHAR(100) UNIQUE NOT NULL,  
    senha VARCHAR(255) NOT NULL,  
    tipo ENUM('admin', 'usuario') NOT NULL,  
    status ENUM('ativo', 'inativo') DEFAULT 'ativo'  
);  