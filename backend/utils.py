#sample_db = {"Pertanyaan ? ": "Jawaban", "Pertanyaan juga ?": "Jawaban juga"}

def create_db(q_file,ans_file) :
    dict = {}
    questions = open(q_file,"r")
    answers = open(ans_file,"r")
    for q,a in zip(questions,answers) :
        dict[q] = a 
    
    return dict


def main() :
    db = create_db("../QnA/q-fer.txt","../QnA/a-fer.txt")
    print(db)

if __name__ == "__main__":
    main()