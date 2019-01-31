#!/usr/bin/python3
# coding: utf-8
# from __future__ import division

from random import *
import matplotlib.pyplot as plt
import numpy as np

N=int(input("Saisir le nombre de tirage : "))

l=np.array([0]*20)

for i in range(N):
	S=0
	for d in range(3):
		S=S+randint(1,6)
		
	l[S]=l[S]+1
	
print ("---")

for i in range(len(l)):
	print(l[i])

z = len(l)
x = range(z)


plt.bar(x,l)
plt.title('Duc de Toscane')
plt.ylabel('ordonnées')
plt.xlabel('abscisses')
plt.grid(True)
plt.show()
