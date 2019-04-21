def compute_lps(pattern):
    lps, longest, i = [0] * len(pattern), 0, 1
    while i < len(pattern):
        if pattern[i] == pattern[longest]:
            longest += 1
            lps[i] = longest
            i += 1
        else:
            if longest != 0:
                longest = lps[longest-1]
            else:
                lps[i] = 0
                i += 1
    return lps


def KMP(pattern, text):
    """
        Params precondition:
            - stopwords has been trimmed
            - synonimous words has been replaced
            - no trailling whitespaces
            - all words must be in the root form
        Returns:
            - similarity, scaled between 0.0 - 1.0
    """
    lps = compute_lps(pattern)
    i, j = 0, 0
    while i < len(text):
        if pattern[j] == text[i]:
            i += 1
            j += 1
        if j == len(pattern):
            return len(pattern) / float(len(text))
        if i < len(text) and pattern[j] != text[i]:
            if j != 0:
                j = lps[j-1]
            else:
                i += 1
    return 0


# HOWTO USE
if __name__ == "__main__":
    similarity = KMP("apa chatbot", "apa chatbot manusia")
    print(str(similarity * 100) + " %")
