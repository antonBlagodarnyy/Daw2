""" 3. Pide al usuario un número. Crea una lista de palabras,
que se irán pidiendo al usuario. El número de palabras será 
el número que se introdujo. 
Muestra la lista. A continuación, pide al usuario una nueva palabra
y cambia el valor de la mitad de la lista por la nueva palabra.
Muestra la lista de nuevo. Pide al usuario una palabra y muestra
un mensaje indicando si esa palabra está o no en la lista.
Muestra de entre toda la lista una palabra de forma aleatoria.
 """
 
numero = int(input("Introduzca un numero entero"))
palabras = []

for i in range(1,numero):
    
 