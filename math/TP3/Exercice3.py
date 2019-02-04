import matplotlib.pyplot as plt
import scipy.stats
import numpy as np

N=10000

def gauss():
    mu=0
    sig=0.5

    x = np.random.randn(N) * sig + mu

    bins = np.linspace(-2,2,100)
    plt.subplot(1,2,1)
    plt.hist(x, bins, normed= 1, alpha=0.5, label='valeurs de x')
    plt.plot(bins,scipy.stats.norm.pdf(bins,mu,sig))

def binomial():


    n=100
    p=0.5


    x = np.random.binomial(N,p,10000)

    bins = np.linspace(N/2-100,N/2+100,100)
    plt.subplot(1,2,2)
    plt.hist(x, bins, normed= 1, alpha=0.5, label='valeurs de x')
    plt.plot(bins,scipy.stats.norm.pdf(bins,N/2,45))
    plt.show()



gauss()
binomial()

# On obtient des courbes de gausses si le nombre tiré est grand