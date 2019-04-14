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

def boyerMoore(text, pattern):
		#Preprocessing pattern, membuat array of last occurrence
	last = lastOcc(pattern)
	
	n = len(text)
	m = len(pattern)
	i = m-1;
	j = m-1;
	
	if (i>n-1): #Pattern lebih panjang dari text
		return -1
	
		# Periksa teks untuk menemukan pattern
	while (i<=n-1):
		if (pattern[j] == text[i]):
			if (j == 0): # Sudah semua dicek
				return i
			else:
				i-=1
				j-=1
		else:
			lo = last[ord(text[i])] # Mencari last occurrence
			i = i + m - min(j,1+lo) # i new sejajar dengan j new
			j = m-1 #J new adalah index terakhir pattern
	
	
	return -1
