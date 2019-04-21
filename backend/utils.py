from Sastrawi.Stemmer.StemmerFactory import StemmerFactory


def create_db(q_file, ans_file):
    dict = {}
    questions = open(q_file, "r")
    answers = open(ans_file, "r")
    for q, a in zip(questions, answers):
        dict[q] = a
    return dict

sample_db = create_db("../QnA/question.txt", "../QnA/answer.txt")


synonym_raw = {"membangun": "membuat",
               "menciptakan": "membuat",
               "menimbulkan": "membuat",
               "merancang": "membuat",
               "menggunakan": "memakai"}


factory = StemmerFactory()
stemmer = factory.create_stemmer()
synonym = {stemmer.stem(w): stemmer.stem(synonym_raw[w])
           for w in synonym_raw.keys()}

stop_words = {"itu", "kah"}