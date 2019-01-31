#!/usr/bin/python

mot="police"
mot2="picole"


def python(ASCII):
    j=len(ASCII)-1
    v=0
    for i in ASCII:
        v+=ord(i)*256**j
        j=j-1
    return v

def python2(ASCII):
    v=0
    for i in ASCII:
        v=v*256+(ord(i))
    return v
#decomposition de horner



def h(string):
    v=python(string)%255
    print(v)

def h2(string):
    v=python2(string)%255
    print(v)

print("mot1 : police")
h(mot)
print("mot2 : picole")
h(mot2)

print("mot1 : police")
h2(mot)
print("mot2 : picole")
h2(mot2)

#Le resultat est logique peut importe l'ordre des lettres on prend leurs valeurs numérique et fait modulo 255 donc peut importe l'ordre
