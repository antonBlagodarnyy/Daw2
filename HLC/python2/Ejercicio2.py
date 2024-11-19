""" 2. Generar un número aleatorio de números aleatorios 
(de entre 1 y 20) y añadirlos a una lista. Mostrar la lista 
y el número de elementos de la lista. """
import random 

mi_lista= []

rango = random.randint(1,20)


for i in range (1, rango):
    mi_lista.append(random.randint(1,20))
    
print(mi_lista)