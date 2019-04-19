import re


def regex_sample(question_user, question_db):
    q_split = question_user.split(" ")

    pattern = ".*"
    for word in q_split:
        pattern = pattern + "[%s]" % (word) + ".*"

    res = re.search(pattern, question_db)
    if res is not None:
        return True
    else:
        return False
