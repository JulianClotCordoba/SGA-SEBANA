# BRANCH.md - Guía de Trabajo con Ramas (Branches)

## ¿Qué es un Branch y por qué lo usamos?

Un **branch** (rama) en Git es como una copia independiente del proyecto donde puedes trabajar sin afectar el código principal. Es como tener tu propia versión del proyecto donde puedes experimentar, hacer cambios y probar cosas sin romper lo que ya funciona.

### Analogía para entenderlo mejor

Imagina que el proyecto es un documento de Word:

- **main** (rama principal): Es el documento original y oficial que todos deben respetar
- **tu-branch** (tu rama): Es una copia del documento donde tú trabajas libremente
- Cuando terminas tu parte, **fusionas** (merge) tu copia con el documento original

---

## Estructura de Branches del Proyecto SGA-SEBANA

En este proyecto, cada integrante del equipo tiene su propia rama (branch) para trabajar de forma independiente:

### Ramas del Proyecto:
```
main (rama principal - código oficial)
├── julian-clot (1-1926-0815)
├── joel-peralta (1-1922-0621)
├── derlis-hernandez (7-0200-0717)
└── jorge-castrillo (2-0872-0752)
```

### Nombre de las ramas:

- **main**: Rama principal donde está el código oficial y estable
- **julian-clot**: Rama de trabajo de Julián Clot Córdoba
- **joel-peralta**: Rama de trabajo de Joel Josué Peralta Pérez
- **derlis-hernandez**: Rama de trabajo de Derlis Hernández Carranza
- **jorge-castrillo**: Rama de trabajo de Jorge Luis Castrillo Molina

---

## Reglas de Trabajo con Branches

### Regla 1: Nunca trabajes directamente en main
- La rama **main** es sagrada
- Solo contiene código revisado y funcionando
- **NUNCA** hagas commits directamente en main

### Regla 2: Siempre trabaja en tu branch personal
- Cada quien trabaja en su rama con su nombre
- Haz todos tus cambios en tu rama
- Haz commits frecuentes en tu rama

### Regla 3: Mantén tu branch actualizado con main
- Antes de empezar a trabajar cada día, actualiza tu rama con los cambios de main
- Esto evita conflictos grandes al final

### Regla 4: Comunica cuando hagas cambios grandes
- Avisa al equipo cuando hagas cambios importantes
- Así evitan trabajar en las mismas partes al mismo tiempo

---

## Configuración Inicial (Solo la primera vez)

### Paso 1: Verificar que ya tienes el proyecto clonado

1. Abre la terminal (CMD o Git Bash)
2. Navega a la carpeta del proyecto:
```bash
cd C:\xampp\htdocs\SGA-SEBANA
```

3. Verifica que estés en el proyecto correcto:
```bash
git status
```

Deberías ver algo como:
```
On branch main
Your branch is up to date with 'origin/main'.
```

### Paso 2: Identificar cuál es tu rama

Cada integrante debe trabajar en su propia rama según su nombre:

- **Julián Clot Córdoba** → Rama: `julian-clot`
- **Joel Josué Peralta Pérez** → Rama: `joel-peralta`
- **Derlis Hernández Carranza** → Rama: `derlis-hernandez`
- **Jorge Luis Castrillo Molina** → Rama: `jorge-castrillo`

### Paso 3: Verificar si tu rama ya existe en el repositorio

1. Descarga la información más reciente del repositorio:
```bash
git fetch origin
```

2. Lista todas las ramas que existen (locales y remotas):
```bash
git branch -a
```

Verás algo como:
```
* main
  remotes/origin/main
  remotes/origin/julian-clot
  remotes/origin/joel-peralta
  remotes/origin/derlis-hernandez
  remotes/origin/jorge-castrillo
```

**Las que dicen `remotes/origin/` son las ramas que están en GitHub.**

### Paso 4: Cambiar a tu rama personal

**Caso A: Si tu rama YA existe en el repositorio**

Si ves tu rama en la lista anterior (por ejemplo `remotes/origin/julian-clot`), haz lo siguiente:

1. Cambia a tu rama:
```bash
git checkout julian-clot
```
*(Reemplaza `julian-clot` con el nombre de TU rama)*

2. Git descargará tu rama automáticamente y dirá algo como:
```
Branch 'julian-clot' set up to track remote branch 'julian-clot' from 'origin'.
Switched to a new branch 'julian-clot'
```

3. Verifica que estés en tu rama:
```bash
git branch
```

Deberías ver un asterisco (*) junto al nombre de tu rama:
```
  main
* julian-clot
```

**Caso B: Si tu rama NO existe (debes crearla)**

Si no ves tu rama en la lista, debes crearla:

1. Asegúrate de estar en la rama main:
```bash
git checkout main
```

2. Actualiza main con los últimos cambios:
```bash
git pull origin main
```

3. Crea tu nueva rama basada en main:
```bash
git checkout -b julian-clot
```
*(Reemplaza `julian-clot` con el nombre de TU rama)*

4. Sube tu nueva rama a GitHub por primera vez:
```bash
git push -u origin julian-clot
```
*(Reemplaza `julian-clot` con el nombre de TU rama)*

Git dirá algo como:
```
Total 0 (delta 0), reused 0 (delta 0)
To https://github.com/USUARIO/SGA-SEBANA.git
 * [new branch]      julian-clot -> julian-clot
Branch 'julian-clot' set up to track remote branch 'julian-clot' from 'origin'.
```

5. Verifica que estés en tu rama:
```bash
git branch
```

Deberías ver:
```
  main
* julian-clot
```

---

## Flujo de Trabajo Diario (MUY IMPORTANTE)

Este es el proceso que seguirás **TODOS LOS DÍAS** antes de empezar a trabajar:

### Paso 1: Abrir el proyecto

1. Abre la terminal
2. Navega al proyecto:
```bash
cd C:\xampp\htdocs\SGA-SEBANA
```

### Paso 2: Verificar en qué rama estás
```bash
git branch
```

**Debes estar en TU rama personal** (julian-clot, joel-peralta, derlis-hernandez o jorge-castrillo).

Si estás en `main`, cambia a tu rama:
```bash
git checkout tu-nombre-de-rama
```

Por ejemplo:
```bash
git checkout julian-clot
```

### Paso 3: Actualizar la rama main (CRÍTICO)

Antes de empezar a trabajar, debes traer los últimos cambios que otros hayan subido a `main`:

1. Cambia temporalmente a la rama main:
```bash
git checkout main
```

2. Descarga los últimos cambios de main:
```bash
git pull origin main
```

Verás algo como:
```
From https://github.com/USUARIO/SGA-SEBANA
 * branch            main       -> FETCH_HEAD
Already up to date.
```

O si hay cambios nuevos:
```
From https://github.com/USUARIO/SGA-SEBANA
 * branch            main       -> FETCH_HEAD
Updating 3a2b1c4..7d8e9f0
Fast-forward
 index.html | 10 +++++-----
 1 file changed, 5 insertions(+), 5 deletions(-)
```

### Paso 4: Volver a tu rama
```bash
git checkout tu-nombre-de-rama
```

Por ejemplo:
```bash
git checkout julian-clot
```

### Paso 5: Fusionar los cambios de main en tu rama (CRÍTICO)

Ahora debes traer todos los cambios que descargaste de `main` a tu rama personal:
```bash
git merge main
```

**¿Qué puede pasar?**

**Opción A: Fusión exitosa sin conflictos**

Verás algo como:
```
Updating 1a2b3c4..5d6e7f8
Fast-forward
 css/style.css | 15 +++++++++------
 1 file changed, 9 insertions(+), 6 deletions(-)
```

¡Perfecto! Continúa al siguiente paso.

**Opción B: Hay conflictos**

Verás algo como:
```
Auto-merging index.html
CONFLICT (content): Merge conflict in index.html
Automatic merge failed; fix conflicts and then commit the result.
```

**No te asustes, es normal**. Significa que tú y otra persona modificaron las mismas líneas. Ve a la sección **"Resolver Conflictos"** más abajo.

### Paso 6: Ahora sí, empieza a trabajar

Ahora que tu rama está actualizada con los últimos cambios de `main`:

1. Abre Visual Studio Code
2. Abre la carpeta del proyecto
3. Haz las modificaciones que necesites
4. Guarda los archivos (Ctrl + S)

---

## Guardar y Subir tus Cambios

Después de trabajar y hacer modificaciones, debes guardarlas en Git y subirlas a GitHub:

### Paso 1: Ver qué archivos modificaste
```bash
git status
```

Verás en rojo los archivos que modificaste:
```
On branch julian-clot
Changes not staged for commit:
  modified:   index.html
  modified:   css/style.css
```

### Paso 2: Agregar los archivos modificados

**Para agregar todos los archivos modificados**:
```bash
git add .
```

**O para agregar un archivo específico**:
```bash
git add index.html
```

### Paso 3: Verificar que se agregaron correctamente
```bash
git status
```

Ahora los archivos deben aparecer en verde:
```
On branch julian-clot
Changes to be committed:
  modified:   index.html
  modified:   css/style.css
```

### Paso 4: Hacer commit con un mensaje descriptivo
```bash
git commit -m "Descripción clara de lo que hiciste"
```

**Ejemplos de buenos commits**:
```bash
git commit -m "Agregado formulario de registro de clientes"
git commit -m "Corregido error en validación de formulario"
git commit -m "Actualizado diseño de la tabla de productos"
git commit -m "Implementado gráfico de ventas mensuales"
```

**Malos ejemplos** (NO hagas esto):
```bash
git commit -m "cambios"
git commit -m "update"
git commit -m "fix"
```

### Paso 5: Subir tus cambios a GitHub
```bash
git push origin tu-nombre-de-rama
```

Por ejemplo:
```bash
git push origin julian-clot
```

Verás algo como:
```
Enumerating objects: 7, done.
Counting objects: 100% (7/7), done.
Delta compression using up to 8 threads
Compressing objects: 100% (4/4), done.
Writing objects: 100% (4/4), 523 bytes | 523.00 KiB/s, done.
Total 4 (delta 2), reused 0 (delta 0)
To https://github.com/USUARIO/SGA-SEBANA.git
   3a2b1c4..7d8e9f0  julian-clot -> julian-clot
```

**¡Listo!** Tus cambios están ahora en GitHub en tu rama personal.

---

## Resolver Conflictos (Paso a Paso)

Un conflicto ocurre cuando tú y otra persona modificaron las mismas líneas de código.

### ¿Cómo saber si hay un conflicto?

Cuando hagas `git merge main` y haya conflictos, verás algo como:
```
Auto-merging index.html
CONFLICT (content): Merge conflict in index.html
Automatic merge failed; fix conflicts and then commit the result.
```

### Paso 1: Identificar los archivos en conflicto
```bash
git status
```

Los archivos en conflicto aparecerán como:
```
Unmerged paths:
  both modified:   index.html
  both modified:   css/style.css
```

### Paso 2: Abrir los archivos en conflicto en tu editor

1. Abre Visual Studio Code
2. Abre el archivo en conflicto (por ejemplo, `index.html`)

### Paso 3: Buscar los marcadores de conflicto

Dentro del archivo verás algo como esto:
```html
<div class="container">
<<<<<<< HEAD
    <h1>Bienvenido al Sistema - Versión de Julian</h1>
    <p>Esta es mi modificación</p>
=======
    <h1>Bienvenido al Sistema SGA-SEBANA</h1>
    <p>Modificación de main</p>
>>>>>>> main
</div>
```

**Explicación**:
- `<<<<<<< HEAD`: Inicio de TUS cambios (lo que está en tu rama)
- `=======`: Separador
- `>>>>>>> main`: Fin de los cambios de MAIN (lo que está en la rama principal)

### Paso 4: Decidir qué código conservar

Tienes tres opciones:

**Opción A: Conservar solo tus cambios**

Borra los marcadores y el código de main, deja solo tu código:
```html
<div class="container">
    <h1>Bienvenido al Sistema - Versión de Julian</h1>
    <p>Esta es mi modificación</p>
</div>
```

**Opción B: Conservar solo los cambios de main**

Borra los marcadores y tu código, deja solo el de main:
```html
<div class="container">
    <h1>Bienvenido al Sistema SGA-SEBANA</h1>
    <p>Modificación de main</p>
</div>
```

**Opción C: Combinar ambos cambios**

Borra los marcadores y combina lo mejor de ambos:
```html
<div class="container">
    <h1>Bienvenido al Sistema SGA-SEBANA</h1>
    <p>Esta es mi modificación</p>
</div>
```

### Paso 5: Guardar el archivo

Presiona Ctrl + S para guardar el archivo.

### Paso 6: Marcar el conflicto como resuelto
```bash
git add index.html
```

Repite esto para cada archivo en conflicto.

### Paso 7: Verificar que todos los conflictos estén resueltos
```bash
git status
```

Ya no debe decir "Unmerged paths". Debe decir:
```
All conflicts fixed but you are still merging.
```

### Paso 8: Completar el merge
```bash
git commit -m "Resueltos conflictos con main"
```

Git creará automáticamente el mensaje de commit. Si abre un editor de texto:
- Si es **Vim** (editor negro): Presiona `:wq` y Enter
- Si es **Nano**: Presiona Ctrl + X, luego Y, luego Enter

### Paso 9: Subir los cambios
```bash
git push origin tu-nombre-de-rama
```

**¡Conflicto resuelto!**

---

## Mantener tu Rama Actualizada (Rutina Recomendada)

Para evitar conflictos grandes, actualiza tu rama con `main` frecuentemente:

### ¿Cuándo actualizar?

- **Al inicio de cada día** antes de empezar a trabajar
- **Después de que un compañero suba cambios importantes a main**
- **Antes de hacer un Pull Request** (cuando quieras fusionar tu rama con main)

### ¿Cómo actualizar?

Sigue estos pasos (ya los explicamos arriba, pero aquí está el resumen):

1. Guarda y haz commit de tus cambios actuales:
```bash
git add .
git commit -m "Guardando cambios antes de actualizar"
```

2. Cambia a main y actualízala:
```bash
git checkout main
git pull origin main
```

3. Vuelve a tu rama:
```bash
git checkout tu-nombre-de-rama
```

4. Fusiona main en tu rama:
```bash
git merge main
```

5. Si hay conflictos, resuélvelos siguiendo la sección anterior

6. Sube tu rama actualizada:
```bash
git push origin tu-nombre-de-rama
```

---

## Verificar en Qué Rama Estás (en cualquier momento)

### Comando rápido:
```bash
git branch
```

Verás algo como:
```
  main
* julian-clot
  joel-peralta
```

El asterisco (*) indica en qué rama estás actualmente.

### Comando con más detalle:
```bash
git status
```

Muestra:
```
On branch julian-clot
Your branch is up to date with 'origin/julian-clot'.

nothing to commit, working tree clean
```

---

## Cambiar Entre Ramas

### Cambiar a tu rama personal:
```bash
git checkout julian-clot
```

### Cambiar a main:
```bash
git checkout main
```

### Cambiar a la rama de otro compañero (para revisar su código):
```bash
git checkout joel-peralta
```

**Importante**: Antes de cambiar de rama, asegúrate de hacer commit de tus cambios o guardarlos temporalmente.

---

## Ver el Historial de Commits de tu Rama

### Ver todos los commits:
```bash
git log
```

Presiona `Q` para salir.

### Ver commits de forma compacta:
```bash
git log --oneline
```

Verás algo como:
```
7d8e9f0 Agregado formulario de contacto
5a6b7c8 Corregido error en tabla
3a2b1c4 Actualizado diseño del dashboard
```

### Ver solo tus últimos 5 commits:
```bash
git log --oneline -5
```

---

## Comparar tu Rama con Main

Para ver qué cambios has hecho en tu rama que main no tiene:
```bash
git diff main..tu-nombre-de-rama
```

Por ejemplo:
```bash
git diff main..julian-clot
```

Verás las diferencias línea por línea.

---

## Borrar Cambios No Guardados (Si te equivocaste)

### Ver qué archivos modificaste:
```bash
git status
```

### Descartar cambios en un archivo específico:
```bash
git checkout -- nombre-archivo.html
```

Por ejemplo:
```bash
git checkout -- index.html
```

**Advertencia**: Esto borrará TODOS los cambios no guardados en ese archivo.

### Descartar TODOS los cambios no guardados:
```bash
git checkout -- .
```

**Advertencia**: Esto borrará TODOS los cambios no guardados en todos los archivos.

---

## Resumen de Comandos por Integrante

### Para Julián Clot Córdoba (Rama: julian-clot)
```bash
# Configuración inicial (solo una vez)
cd C:\xampp\htdocs\SGA-SEBANA
git checkout julian-clot

# Rutina diaria
git checkout main
git pull origin main
git checkout julian-clot
git merge main

# Después de trabajar
git add .
git commit -m "Descripción de cambios"
git push origin julian-clot
```

### Para Joel Josué Peralta Pérez (Rama: joel-peralta)
```bash
# Configuración inicial (solo una vez)
cd C:\xampp\htdocs\SGA-SEBANA
git checkout joel-peralta

# Rutina diaria
git checkout main
git pull origin main
git checkout joel-peralta
git merge main

# Después de trabajar
git add .
git commit -m "Descripción de cambios"
git push origin joel-peralta
```

### Para Derlis Hernández Carranza (Rama: derlis-hernandez)
```bash
# Configuración inicial (solo una vez)
cd C:\xampp\htdocs\SGA-SEBANA
git checkout derlis-hernandez

# Rutina diaria
git checkout main
git pull origin main
git checkout derlis-hernandez
git merge main

# Después de trabajar
git add .
git commit -m "Descripción de cambios"
git push origin derlis-hernandez
```

### Para Jorge Luis Castrillo Molina (Rama: jorge-castrillo)
```bash
# Configuración inicial (solo una vez)
cd C:\xampp\htdocs\SGA-SEBANA
git checkout jorge-castrillo

# Rutina diaria
git checkout main
git pull origin main
git checkout jorge-castrillo
git merge main

# Después de trabajar
git add .
git commit -m "Descripción de cambios"
git push origin jorge-castrillo
```

---

## Errores Comunes y Soluciones

### Error: "Your local changes would be overwritten by merge"

**Problema**: Intentaste cambiar de rama o hacer merge pero tienes cambios sin guardar.

**Solución**:
```bash
git add .
git commit -m "Guardando cambios antes de cambiar de rama"
```

Ahora ya puedes cambiar de rama o hacer merge.

### Error: "fatal: A branch named 'julian-clot' already exists"

**Problema**: Intentaste crear una rama que ya existe.

**Solución**: Solo cambia a esa rama:
```bash
git checkout julian-clot
```

### Error: "You are not currently on a branch"

**Problema**: Estás en un "detached HEAD state" (estado de cabeza separada).

**Solución**: Vuelve a tu rama:
```bash
git checkout julian-clot
```

### Mensaje: "Your branch is ahead of 'origin/julian-clot' by X commits"

**Problema**: Hiciste commits localmente pero no los has subido a GitHub.

**Solución**:
```bash
git push origin julian-clot
```

### Mensaje: "Your branch is behind 'origin/julian-clot' by X commits"

**Problema**: Alguien (probablemente tú desde otra computadora) subió commits que no tienes localmente.

**Solución**:
```bash
git pull origin julian-clot
```

---

## Buenas Prácticas

### 1. Haz commits frecuentes
- No esperes a terminar todo para hacer commit
- Haz commit cada vez que completes una funcionalidad pequeña
- Es mejor 10 commits pequeños que 1 commit gigante

### 2. Escribe buenos mensajes de commit
**Buenos ejemplos**:
- "Agregada validación de email en formulario de registro"
- "Corregido error de alineación en tabla de productos"
- "Implementada funcionalidad de búsqueda en dashboard"

**Malos ejemplos**:
- "cambios"
- "update"
- "fix"
- "asdf"

### 3. Actualiza tu rama diariamente
- Siempre actualiza tu rama con main al inicio del día
- Esto evita conflictos grandes

### 4. Comunícate con el equipo
- Avisa cuando hagas cambios importantes
- Coordina para no trabajar en los mismos archivos simultáneamente
- Si ves un conflicto difícil de resolver, pide ayuda

### 5. Prueba tu código antes de hacer commit
- Asegúrate de que tu código funcione en XAMPP
- Abre el proyecto en el navegador y verifica que todo esté bien
- No subas código roto

### 6. No trabajes directamente en main
- NUNCA hagas commits en main
- Siempre trabaja en tu rama personal
- Main solo se actualiza mediante Pull Requests (esto lo veremos después)

---

## Glosario de Términos

- **Branch (Rama)**: Una línea independiente de desarrollo
- **main**: La rama principal con el código oficial
- **HEAD**: El punto actual donde estás trabajando
- **Commit**: Una fotografía del estado del proyecto en un momento dado
- **Merge**: Fusionar los cambios de una rama en otra
- **Conflict (Conflicto)**: Cuando dos personas modifican las mismas líneas y Git no sabe cuál conservar
- **origin**: El nombre del repositorio remoto en GitHub
- **push**: Subir commits locales a GitHub
- **pull**: Descargar commits de GitHub a tu computadora
- **checkout**: Cambiar de rama o restaurar archivos

---

## Diagrama de Flujo de Trabajo
```
Inicio del día
    |
    v
¿Estás en tu rama? --NO--> git checkout tu-rama
    |
    YES
    v
Actualizar main (git checkout main → git pull origin main)
    |
    v
Volver a tu rama (git checkout tu-rama)
    |
    v
Fusionar main en tu rama (git merge main)
    |
    v
¿Hay conflictos? --SÍ--> Resolver conflictos manualmente
    |                         |
    NO                        v
    |                    git add . → git commit
    |                         |
    v<------------------------+
Trabajar en tus archivos (editar código)
    |
    v
Guardar archivos (Ctrl + S)
    |
    v
Probar en navegador (localhost)
    |
    v
¿Todo funciona bien? --NO--> Corregir errores
    |                             |
    YES                           |
    |<----------------------------+
    v
Hacer commit (git add . → git commit -m "...")
    |
    v
Subir a GitHub (git push origin tu-rama)
    |
    v
Fin del día
```

---

## Recursos de Ayuda

Si tienes dudas o problemas:

1. **Revisa esta guía nuevamente** - La mayoría de las respuestas están aquí
2. **Pregunta a tus compañeros** - Probablemente alguien ya resolvió el mismo problema
3. **Busca en Google** - Copia el mensaje de error y búscalo
4. **Documentación oficial de Git**: [https://git-scm.com/doc](https://git-scm.com/doc)
5. **GitHub Guides**: [https://guides.github.com/](https://guides.github.com/)

---

**Última actualización**: Enero 2025
