from flask import Flask, request, jsonify
from .algo import answer
import json

from flask_cors import CORS

import json
app = Flask(__name__)
CORS(app)


@app.route('/', methods=['POST'])
def respond():
    user_request = request.get_json()
    if user_request:
        user_question = user_request["question"]
        response = answer(user_question)
        return jsonify({"question": user_question, "answer": response})
    else:
        return jsonify({"error": "request is None"})
