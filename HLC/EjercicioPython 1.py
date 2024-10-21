#Ej1
nombre = input("Como se llama?")

print (f'''¡Hola {nombre}! - Me alegro de conocerle, {nombre}''')

#Ej2
nombre = input("Como se llama?")

print ("Nombre:"+nombre.upper())

print ("Numero de ocurrencias:"+str(len(nombre)))

for i in range (0, len(nombre)):
    print(nombre)

#Ej3
num = input ("Introduzca un numero")
num = int(num)
for i in range (0, num):
    if i % 2 == 0:
        print(str(i))
        
#Ej4
peso = float(input("Introduzca su peso en kg"))
estatura = float(input("Introduzca su estatura en metros"))
""" peso = float(peso)
estatura = float(estatura) """
IMC = peso/estatura ** 2;
print(f"Su IMC es de {IMC}")
