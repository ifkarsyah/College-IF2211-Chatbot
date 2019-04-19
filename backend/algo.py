from .utils import sample_db
from .kmp import KMP
from .bm import boyerMoore
from .regex import regex_sample


def answer(question_user):
    for q_db in sample_db:
        if KMP(question_user, q_db) > 0.9:
            return sample_db[q_db]
        elif boyerMoore(question_user, q_db) > 0.9:
            return sample_db[q_db]
        elif regex_sample(question_user, q_db):
            return sample_db[q_db]
    top_three = [KMP(question_user, q_db) for q_db in sample_db]
    top_three.sort()
    top_three.reverse()
    top_three = top_three[:3]
    msg_error = "Saya Bingung. Mungkin anda ingin menanyakan hal berikut: \n"
    msg_error += "1. " + top_three[0]
    msg_error += "2. " + top_three[1]
    msg_error += "3. " + top_three[2]
    return msg_error
