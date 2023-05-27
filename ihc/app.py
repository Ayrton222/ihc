from flask import Flask, request, jsonify, render_template, send_from_directory, redirect, url_for
from geopy.geocoders import Nominatim
from geopy.distance import geodesic
import time
from py import validaLogin

app = Flask(__name__, template_folder='template')

geolocator = Nominatim(user_agent="my_app")

@app.route('/calculate_distance', methods=['POST'])
def calculate_distance():
    data = request.get_json()
    origin = data['origin']
    destination = data['destination']

    try:
        time.sleep(1)
        origin_location = geolocator.geocode(origin)
        destination_location = geolocator.geocode(destination)

        if origin_location is None or destination_location is None:
            return jsonify({'error': 'Endereço inválido.'}), 400

        origin_coords = (origin_location.latitude, origin_location.longitude)
        destination_coords = (destination_location.latitude, destination_location.longitude)

        distance = calculate_distance_manual(origin_coords, destination_coords)

        print(f"Origin: {origin}")
        print(f"Destination: {destination}")
        print(f"Origin Coordinates: {origin_coords}")
        print(f"Destination Coordinates: {destination_coords}")
        print(f"Distance: {distance} km")

        return jsonify({'origin': origin, 'destination': destination, 'distance': distance})

    except Exception as e:
        print(f"Error: {str(e)}")
        return jsonify({'error': 'Erro ao calcular a distância.', 'exception': str(e)}), 500


def calculate_distance_manual(coords1, coords2):
    distance = geodesic(coords1, coords2).kilometers
    distance = round(distance / 1000, 2)  # Divide por 1000 e arredonda para duas casas decimais
    return distance


@app.route('/php/index.php', methods=['GET'])
def show_form():
    with open('index.html', 'r') as file:
        return file.read()

@app.route('/static/css/<path:filename>')
def css_file(filename):
    return send_from_directory('static/css', filename)

@app.route('/static/img/<path:filename>')
def img_file(filename):
    return send_from_directory('static/img', filename)

@app.route('/static/js/<path:filename>')
def js_file(filename):
    return send_from_directory('static/js', filename)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/login')
def login():
    return render_template('login.html')

@app.route('/validaLogin', methods=['POST'])    
def validaLogina():
    nome = request.form.get('nome')
    email = request.form.get('email')
    senha = request.form.get('senha')

    # Chamar função de processamento em outro arquivo
    resultado = validaLogin.processar_dados(nome, email,senha)

    return resultado


@app.route('/sucesso')
def sucesso():
    return "Dados processados com sucesso!"


if __name__ == '__main__':
    app.run(debug=True)
