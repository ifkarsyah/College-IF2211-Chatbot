from flask import Flask, request, jsonify
from .algo import answer
import json
app = Flask(__name__)


@app.route('/', methods=['POST'])
def respond():
    question = request.get_json()
    response = answer(question["question"])
    return jsonify({"question": question, "response" : response})
