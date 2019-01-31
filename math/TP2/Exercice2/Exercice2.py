# from __future__ import division

from random import uniform

import numpy as np
import matplotlib.pyplot as plt

Rad = 1.0
N=int(input("Saisir le nombre de tirage : "))

x_list = []
y_list = []
test = []
nb_pts_dedans = 0

for i in range(N):
    x = uniform(0,Rad)
    y = uniform(0,Rad)
    x_list.append(x)
    y_list.append(y)
    if x**2+y**2 > Rad**2:
        test.append(0)
    else:
        test.append(1)  
        nb_pts_dedans = nb_pts_dedans + 1

pi = 4.0 * nb_pts_dedans / N

print('nb dedans : ',nb_pts_dedans)
print ('pi: ', pi)

color1=(0, 0, 0, 1)
color2=(1, 0.1, 0, 1)

colormap = np.array([color1,color2])

plt.scatter(x_list,y_list,c=colormap[test])
plt.ylabel('ordonnées')
plt.xlabel('abscisses')
plt.grid(True)

plt.show()
