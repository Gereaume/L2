#!/usr/bin/python

#22 personnes -> proba : 0.4756953076625501
#151 personnes -> proba : 0.9999999999999999 soit 1

def factorielle(n):
    if n < 2:
        return 1
    else:
        return n*factorielle(n-1)

def anniversaires(n):
    return(1-factorielle(365)/(factorielle(365-n)*365**n))

# Rapport avec tables de hachage :
# C'est quand il y a une colision, que deux personnes ont le même jour d'anniversaires


def anniversaires_bis(n,m):
    return(1-factorielle(m)/(factorielle(m-n)*m**n))

resultat=anniversaires(22)
print(resultat)

res1=anniversaires_bis(8,64)
print("n = 8")
print(res1)

res2=anniversaires_bis(4,16)
print("n = 4")
print(res2)

res3=anniversaires_bis(22,22*22)
print("n = 22")
print(res3)

res4=anniversaires_bis(52,52*52*52)
print("n =  52 ")
print(res4)
