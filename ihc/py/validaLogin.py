from flask import Flask, render_template
import sqlite3

app = Flask(__name__,template_folder='template')


def processar_dados(nome, email,senha):

    print("Content-Type: text/html\n")

    #obtem os dados

    print("<h1>Dados do formulário:</h1>")
    print(f"Nome: {nome}<br>")
    print(f"Email: {email}<br>")
    print(f"Senha: {senha}<br>")


    conexao  = sqlite3.connect("py/ihc.sqlite")
    cursor = conexao.cursor()

    cursor.execute("SELECT * FROM usuario WHERE email = ?", (email,))

    resultado = cursor.fetchone()

    if resultado:
        print(email)
    else:
        print("Dado nao encontrado")

    if resultado:
            resultado_msg = email
    else:
            resultado_msg = "Dado não encontrado"

    caminho = "map.html"
    return render_template(caminho, nome=nome, email=email, senha=senha, resultado=resultado_msg)

