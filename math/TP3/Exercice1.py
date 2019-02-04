#!/usr/bin/python
import matplotlib.pyplot as plt
import numpy as np

x = np.arange(0,100)
y = (x-1)**2

#créer 10 bins uniformément répartis sur les valeurs de y
plt.subplot(1,2,1)
plt.title('histogramme 1')
plt.hist(y, bins=10, normed=False)

#créer 10 bins uniformément répartis sur les valeurs comprises en 0 et 10000 (exclu)
plt.subplot(1,2,2)
plt.title('histogramme 2')
biny = np.linspace(0,10000,10)
plt.hist(y, bins=biny, normed=False)
plt.show()