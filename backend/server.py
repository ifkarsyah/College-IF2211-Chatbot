from flask import Flask, request, jsonify
from .algo import answer
app = Flask(__name__)


@app.route('/', methods=['POST'])
def respond():
    response = answer(request.form['question'])
    return jsonify(response)
