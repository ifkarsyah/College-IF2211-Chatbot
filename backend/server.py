from flask import Flask, request, jsonify
from .algo import answer

from flask_cors import CORS

import json
app = Flask(__name__)
CORS(app)


@app.route('/', methods=['POST', 'GET'])
def respond():
    question = request.get_json()
    print(question)
    response = answer(question["question"])
    return jsonify({"question": question["question"], "response": response})
