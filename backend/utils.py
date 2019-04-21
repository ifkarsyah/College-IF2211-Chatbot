from Sastrawi.Stemmer.StemmerFactory import StemmerFactory


def create_db(q_file, ans_file):
    dict = {}
    questions = open(q_file, "r")
    answers = open(ans_file, "r")
    for q, a in zip(questions, answers):
        dict[q] = a
    return dict


sample_db = create_db("../QnA/question.txt", "../QnA/answer.txt")
synonym_raw = create_db("../QnA/synonym_ss.txt", "../QnA/synonym_base.txt")


factory = StemmerFactory()
stemmer = factory.create_stemmer()
synonym = {stemmer.stem(w): stemmer.stem(synonym_raw[w])
           for w in synonym_raw.keys()}


def add_stop_word(filename):
    stop_words = {"itu"}
    with open(filename) as file:
        for w in file:
            stop_words.add(w)
    return stop_words


stop_words = add_stop_word("../QnA/stopword.txt")
