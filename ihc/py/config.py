import sqlite3
import os 

#caminho = os.path.join("./bd", "ihc.sqlite")

conexao  = sqlite3.connect("ihc.sqlite")

cursor = conexao.cursor()

cursor.execute('''CREATE TABLE IF NOT EXISTS usuario
                  (id INTEGER PRIMARY KEY AUTOINCREMENT,
                  nome TEXT NOT NULL,
                  email TEXT NOT NULL,
                  senha TEXT NOT NULL)''')

cursor.execute("INSERT INTO usuario (nome, email, senha) VALUES ( 'testePy', 'teste@py','1234') ")

conexao.commit()
conexao.close()