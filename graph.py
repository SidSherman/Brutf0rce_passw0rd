import matplotlib.pyplot as plt
import re

A = []

with open('/home/sidsherman/Projects/pythonlab1/time.txt', 'r') as time:
    temp = time.readlines()
    for i in range(len(temp)):
        lenth = re.search(r'[0-9]', temp[i])
        time = re.search(r'[0-9]{1,}[.][0-9]{1,5}', temp[i])
        A.append([int(lenth.group(0)), float(time.group(0))])

D = dict()
for i in range(len(A)):
    sum = 0
    count = 0
    for j in range(len(A)):
        if (A[i][0] == A[j][0]):
            sum = sum + A[j][1]
            count += 1
    avr = sum /count
    D[A[i][0]] = avr


plt.grid()
plt.title('Зависимость времени подбора от длины пароля')
plt.xlabel("Длина пароля")
plt.ylabel("Среднее время подбора (с)")
plt.plot(D.keys(), D.values())
plt.show()