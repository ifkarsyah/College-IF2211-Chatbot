from flask import Flask, request, jsonify
from .algo import answer
app = Flask(__name__)


@app.route('/', methods=['POST'])
def respond():
    question = request.form['question']
    response = answer(question)
    return jsonify({"question": question, "response" : response})
