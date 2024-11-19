""" 1. Escribir un programa que almacene en una lista los números
del 1 al 100 y los muestre por pantalla 
en orden inverso separados por comas. """

mi_lista = []

for i in range(1,101):
    mi_lista.append(i)
    
for numero in reversed(mi_lista):
    print(f"{numero} ,", end=' ')