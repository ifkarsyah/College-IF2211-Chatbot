from flask import Flask, request, jsonify
from .algo import answer

from flask_cors import CORS

import json
app = Flask(__name__)
CORS(app)


@app.route('/', methods=['GET'])
def respond():
    question = request.args["question"]
    print(question)
    response = answer(question)
    return jsonify({"question": question, "response": response})
