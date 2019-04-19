# sample_db = {"Pertanyaan ? ": "Jawaban", "Pertanyaan juga ?": "Jawaban juga"}


def create_db(q_file, ans_file):
    dict = {}
    questions = open(q_file, "r")
    answers = open(ans_file, "r")
    for q, a in zip(questions, answers):
        dict[q] = a

    return dict


def main():
    db = create_db("../QnA/question.txt", "../QnA/answer.txt")
    print(db)

sample_db = create_db("../QnA/question.txt", "../QnA/answer.txt")

if __name__ == "__main__":
    main()
