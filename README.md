# SGA-SEBANA - Sistema de Gestión Administrativa

**SGA-SEBANA** es un sistema de administración web diseñado para gestionar información desde un panel administrativo moderno, claro y responsive. Está construido con HTML, CSS, JavaScript (Vanilla) y Bootstrap 5, pensado para ejecutarse fácilmente en entornos locales como XAMPP y escalarse con backend (PHP + MySQL).

---

## Características principales

- Diseño responsive (funciona en PC, tablet y celular)
- Panel administrativo completo
- Gráficas y estadísticas integradas
- Tablas y formularios administrativos
- Pantallas de autenticación (login, registro, recuperación)
- No requiere procesos de compilación
- Estructura clara y fácil de modificar

---

## Tecnologías usadas

- **HTML5**
- **CSS3**
- **Bootstrap 5**
- **JavaScript Vanilla** (sin jQuery)
- **Chart.js** (gráficas)
- **Font Awesome** (iconos)
- **XAMPP** (servidor local)

---

## Estructura básica del proyecto
```
SGA-SEBANA/
├── css/            → Estilos del sistema
├── js/             → Lógica JavaScript (gráficas, interacciones)
├── vendor/         → Librerías externas (Bootstrap, Chart.js, etc.)
├── images/         → Imágenes e iconos
├── fonts/          → Fuentes tipográficas
├── index.html      → Dashboard principal
├── login.html      → Inicio de sesión
├── table.html      → Gestión de tablas
├── form.html       → Formularios
└── ...
```

---

## Cómo ejecutar SGA-SEBANA en XAMPP

### 1. Instalar XAMPP

Descargar desde: [https://www.apachefriends.org/](https://www.apachefriends.org/)

### 2. Iniciar Apache

Abrir **XAMPP Control Panel** y presionar **Start** en **Apache**.

### 3. Copiar el proyecto

Mover la carpeta del proyecto a:
```
C:\xampp\htdocs\SGA-SEBANA
```

### 4. Abrir en el navegador
```
http://localhost/SGA-SEBANA/index.html
```

El sistema ya estará funcionando.

---

## Clonar el proyecto con Git

### 1. Abrir Git Bash o terminal
```bash
cd C:/xampp/htdocs
```

### 2. Clonar el repositorio
```bash
git clone https://github.com/USUARIO/SGA-SEBANA.git
```

### 3. Acceder desde el navegador
```
http://localhost/SGA-SEBANA
```

---

## Flujo básico de Git (esencial)

**Ver cambios:**
```bash
git status
```

**Agregar archivos:**
```bash
git add .
```

**Crear commit:**
```bash
git commit -m "Descripción corta del cambio"
```

**Subir cambios al repositorio:**
```bash
git push origin main
```

---

## Flujo de trabajo recomendado

1. Clonar el proyecto
2. Ejecutarlo en XAMPP
3. Modificar HTML, CSS o JavaScript
4. Ver cambios en `localhost`
5. Guardar cambios con Git
6. Subir los cambios al repositorio

---

## Importante

- **SGA-SEBANA es frontend por ahora**
- No incluye lógica de base de datos
- Está preparado para integrarse con:
  - PHP
  - MySQL
  - APIs REST
  - Frameworks backend

---

## Objetivo del sistema

SGA-SEBANA busca servir como base sólida para un sistema administrativo, permitiendo:

- Visualización de datos
- Gestión de información
- Escalabilidad futura
- Integración con backend
