/*mysql -u root*/
create database webmotors;
use webmotors;
create table usuario(id_usuario int AUTO_INCREMENT, nome varchar(255), email varchar(255), senha varchar(255), manter_conectado int(1), recuperacao_senha varchar(255), primary key(id_usuario)); 
create table veiculo(id_veiculo int AUTO_INCREMENT, placa varchar(255), versao varchar(255), quilometragem float(8), descricao varchar(255), preco float(8), preco_fipe float(8), condicao_dono_unico int(1), condicao_licenciado int(1), primary key(id_veiculo));
create table opcionais_veiculo(id_opcional int AUTO_INCREMENT, id_veiculo int(255), opcional varchar(255), primary key(id_opcional), foreign key(id_veiculo) references veiculo(id_veiculo));
create table foto_veiculo(id_foto int AUTO_INCREMENT, id_veiculo int(255), url_foto varchar(255), primary key(id_foto), foreign key(id_veiculo) references veiculo(id_veiculo));
create table anuncio (id_anuncio INT AUTO_INCREMENT PRIMARY KEY, id_usuario INT NOT NULL, id_veiculo INT NOT NULL, status VARCHAR(255) NOT NULL, data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP, data_aprovacao DATETIME, foreign key(id_usuario) references usuario(id_usuario), foreign key(id_veiculo) references veiculo(id_veiculo)) DEFAULT CHARSET=utf8mb4;
create table admin(id_admin int AUTO_INCREMENT primary key, id_usuario int, foreign key(id_usuario) references usuario(id_usuario));