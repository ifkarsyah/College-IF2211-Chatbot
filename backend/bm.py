last = 0
# Return array index terakhir char di pattern


def lastOcc(pattern):
    global last
    last = [-1]*256

    for i in range(len(pattern)):
        last[ord(pattern[i])] = i
    return last


# Exact Match
''' Pre-condition:
- Sudah mengurus semua sinonim
- Sudah diubah ke dalam bentuk kata dasarnya
- Sudah menghilangkan stopwords '''

# Mengembalikan 0 jika tidak ditemukan pattern, mengembalikan 1 jika ditemukan


def boyerMoore(question_user, question_database):
    # Preprocessing pattern, membuat array of last occurrence
    last = lastOcc(question_database)

    n = len(question_user)
    m = len(question_database)
    i = m-1
    j = m-1

    if (i > n-1):  # Pattern lebih panjang dari text
        return 0

        # Periksa teks untuk menemukan pattern
    while (i <= n-1):
        if (question_database[j] == question_user[i]):
            if (j == 0):  # Sudah semua dicek
                return 1
            else:
                i -= 1
                j -= 1
        else:
            lo = last[ord(question_user[i])]  # Mencari last occurrence
            i = i + m - min(j, 1+lo)  # i new sejajar dengan j new
            j = m-1  # J new adalah index terakhir pattern

    return 0
