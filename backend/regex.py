import re


def regex_sample(question_user, question_db):
    q_split = question_user.split(" ")

    for word in q_split:
        res = re.search('(' + word + ')', question_db)
        if not res:
            return False
    return True
