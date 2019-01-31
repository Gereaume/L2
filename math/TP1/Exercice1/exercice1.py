#!/usr/bin/python


def ajoute(mot1,mot2,d):
    if mot1 not in d:
        d[mot1]=mot2
    else :
        print("Le mot est déjà présent")
        print("")

def afficher():
    for i in d.keys():
        print(d[i])

def delete(lettre,d):
    for i in list(d.keys()):
        if i[0]==lettre:
           del d[i]
           
           


d = { }

d={"Bonjour" : "Hello", "Crayon" : "Pen" ,"Nuit" : "Night", "Maison" :"House" , "Chaise" : "Chair"}


print(d["Bonjour"])
ajoute("Oiseau","Bird",d)
print(d["Oiseau"])
ajoute("Bonjour","Hello",d)
afficher()
print("")
delete("C",d)
afficher()



