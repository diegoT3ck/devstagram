# Devstagram

Devstagram es una red social desarrollada en Laravel con Tailwind CSS y Livewire, que permite a los usuarios conectarse, compartir publicaciones, seguir a otros usuarios, interactuar mediante comentarios y likes, y recibir notificaciones relevantes.

## Características Principales

- **Perfiles de Usuario:** Los usuarios pueden crear y personalizar sus perfiles, incluyendo la modificación de la información y la foto de perfil.

- **Publicación de Contenido:** Devstagram permite a los usuarios compartir imágenes y textos mediante publicaciones.

- **Seguimiento de Usuarios:** Los usuarios pueden seguir a otros perfiles y ver las publicaciones de los usuarios que siguen.

- **Comentarios y Likes:** Los usuarios pueden interactuar con las publicaciones mediante comentarios y likes, fomentando la participación y la comunidad.

- **Notificaciones:** Los propietarios de publicaciones reciben notificaciones cuando otros usuarios comentan en sus fotos.

## Tecnologías Utilizadas

- **Laravel:** El backend del proyecto se desarrolla utilizando el framework Laravel, proporcionando una estructura robusta y eficiente.

- **Tailwind CSS:** Para el diseño y estilos, se utiliza Tailwind CSS, permitiendo un desarrollo rápido y fácil personalización.

- **Livewire:** La interactividad del frontend se logra con Livewire, una biblioteca de Laravel que simplifica la creación de componentes dinámicos.


1. **Clonar el Repositorio:**
   ```bash
   git clone https://github.com/diegoT3ck/devstagram.git
   ```

2. **Instalar Dependencias:**
```sh
cd devstagram composer install npm install
```
    
3. **Configuración del Entorno:**
    
    - Copiar el archivo `.env.example` a `.env` y configurar la conexión a la base de datos y otras variables de entorno.
    - Generar una nueva clave de aplicación: `php artisan key:generate`
4. **Migraciones y Datos Iniciales:**
    
    `php artisan migrate --seed`
    
5. **Compilar Assets:**
    
    bashCopy code
    
    `npm run dev`
    
6. **Iniciar el Servidor:**
    
    bashCopy code
    
    `php artisan serve`
    

Accede a tu aplicación en [http://localhost:8000](http://localhost:8000/).

## Contribuciones

¡Contribuciones son bienvenidas! Si encuentras errores o mejoras posibles, siéntete libre de abrir un problema o enviar un pull request.

## Licencia

Este proyecto está bajo la licencia [MIT License](https://chat.openai.com/c/LICENSE).

Copy code

`Puedes personalizar este ejemplo según las necesidades específicas de tu proyecto. Asegúrate de proporcionar instrucciones claras y completas para que otros desarrolladores puedan entender y contribuir al proyecto. ¡Espero que te sea útil!`
