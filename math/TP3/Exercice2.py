import matplotlib.pyplot as plt
import numpy as np


def pers_poids_taille():

    N=int(input("Saisir le nombre de personnage : "))

# Avec la loi normale centrée réduite poids

    mu_poids = 65
    sigma_poids = 10

    data_poids_cr = np.random.randn(N) * sigma_poids + mu_poids

    plt.subplot(1,4,1)
    plt.hist(data_poids_cr, bins=75, normed=1,color="blue")
    plt.title('Poids des personnages suivant \n la loi normale centrée réduite')
    plt.grid()

# Avec la loi normale centrée réduite taille
    mu_taille = 185
    sigma_taille = 15

    data_taille_cr = np.random.randn(N) * sigma_taille + mu_taille

    plt.subplot(1,4,2)
    plt.hist(data_taille_cr, bins=75, normed=1,color="darkblue")
    plt.title('Taille des personnages suivant \n la loi normale centrée réduite')
    plt.grid()

# Avec la loi normale poids

    data_poids = np.random.normal(65, 10, N)

    plt.subplot(1,4,3)
    plt.hist(data_poids, bins=75, normed=1,color="red")
    plt.title('Poids des personnages \n suivant la loi normale')
    plt.grid()

# Avec la loi normale taille
    data_taille = np.random.normal(185, 15, N)

    plt.subplot(1,4,4)
    plt.hist(data_taille, bins=75, normed=1,color="darkred")
    plt.title('Taille des personnages \n suivant la loi normale')
    plt.grid()
    plt.show()

# appel de la fonction
pers_poids_taille()