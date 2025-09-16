<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Footer</title>
    <style>
        /* Estilos básicos del body para la demo */
        body {
            margin: 0;
            font-family: system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
        }

        /* --- Estilos del Footer --- */
        .site-footer {
            background-color: #1a202c;
            /* Gris oscuro, casi negro */
            color: #a0aec0;
            /* Texto gris claro */
            padding: 3rem 1rem;
            text-align: center;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            /* Espacio entre los elementos */
        }

        /* --- Iconos de Redes Sociales --- */
        .social-links {
            display: flex;
            gap: 1.25rem;
            /* Espacio entre iconos */
        }

        .social-links a {
            color: #a0aec0;
            /* Color inicial del icono */
            transition: color 0.2s ease-in-out, transform 0.2s ease-in-out;
        }

        .social-links a:hover {
            color: #ffffff;
            /* El icono se vuelve blanco al pasar el cursor */
            transform: translateY(-3px);
            /* Efecto de "levantarse" */
        }

        .social-links svg {
            width: 28px;
            /* Tamaño de los iconos */
            height: 28px;
            fill: currentColor;
            /* El SVG hereda el color del enlace <a> */
        }

        /* --- Enlaces Legales --- */
        .legal-links {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            /* Para que no se rompa en móviles */
            justify-content: center;
            font-size: 0.875rem;
            /* 14px */
        }

        .legal-links a {
            color: #718096;
            /* Un gris un poco más oscuro */
            text-decoration: none;
            transition: color 0.2s ease-in-out;
        }

        .legal-links a:hover {
            color: #a0aec0;
            /* Se aclara al pasar el cursor */
            text-decoration: underline;
        }

        .legal-links span {
            color: #4a5568;
            /* Color del separador */
        }

        /* --- Copyright --- */
        .copyright {
            font-size: 0.875rem;
            /* 14px */
            color: #718096;
        }
    </style>
</head>

<body>

    <main>
    </main>

    <footer class="site-footer">
        <div class="footer-container">

            <div class="social-links">
                <a href="https://merimer08.github.io/" target="_blank" aria-label="Read.cv">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#111111">
                        <title>Mi Porfolio</title>
                        <path d="M23.953 11.993a.95.95 0 0 0-.947-.947h-1.15a.95.95 0 0 0-.947.947v.014c0 .523.424.947.947.947h1.15c.523 0 .947-.424.947-.947v-.014Zm-2.5-2.499a.95.95 0 0 0-.947-.947h-1.15a.95.95 0 0 0-.947.947v5.012c0 .523.424.947.947.947h1.15c.523 0 .947-.424.947-.947V9.494Zm-4.5-.947a.95.95 0 0 0-.947.947v5.012c0 .523.424.947.947.947h1.15c.523 0 .947-.424.947-.947V9.494a.95.95 0 0 0-.947-.947h-1.15Zm-3.5-.553a.95.95 0 0 0-.947-.947h-1.15a.95.95 0 0 0-.947.947v6.118c0 .523.424.947.947.947h1.15c.523 0 .947-.424.947-.947V7.994ZM7.5 9.494a.95.95 0 0 0-.947-.947H5.403a.95.95 0 0 0-.947.947v5.012c0 .523.424.947.947.947h1.15c.523 0 .947-.424.947-.947V9.494Zm-4.5.947a.95.95 0 0 0-.947-.947H.903a.95.95 0 0 0-.947.947v3.118c0 .523.424.947.947.947h1.15c.523 0 .947-.424.947-.947V10.44Z" />
                    </svg>
                </a>

                <a href="https://github.com/Merimer08" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>GitHub</title>
                        <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                    </svg>
                </a>

                <a href="https://www.linkedin.com/in/marialolu/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>LinkedIn</title>
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z" />
                    </svg>
                </a>
            </div>

            <div class="legal-links">
                <a href="#">Aviso Legal</a>
                <span>|</span>
                <a href="#">Política de Privacidad</a>
            </div>

            <div class="copyright">
                &copy; 2025. <a href="{{ '/CV2025.pdf' }}" target="_blank" class="underline">
                    María López
                </a>.Todos los derechos reservados.
            </div>

        </div>
    </footer>

</body>

</html>