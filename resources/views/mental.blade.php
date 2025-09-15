<x-1public>
    {{-- Pasamos un título personalizado al layout --}}
    <x-slot name="title">
        Mapa Mental del Proyecto
    </x-slot>

    {{-- Aquí pegas el código HTML de tu mapa mental, pero SIN el <html>, <head>, <body>, etc. --}}
    {{-- Solo necesitas el contenido, desde el <div class="wrap"> hasta el final del <script> --}}

    <div class="wrap bg-white p-8 rounded-lg shadow-md">
        <h1>🗺️ Gestor de Notas Online Laravel — Mapa Mental</h1>

        <div class="actions">
            <button class="btn" id="expandAll">Desplegar todo</button>
            <button class="btn" id="collapseAll">Colapsar todo</button>
            <button class="btn" id="goLast">Ir al último nodo</button>
        </div>

        <section class="mindmap" id="mindmap">
            <details open>
                <summary class="node">
                    <span class="label">Gestor de Notas Online Laravel</span>
                    <span class="chev">›</span>
                </summary>
                <div class="branch">
                    </div>
            </details>
        </section>
    </div>

    {{-- Tu CSS y JS específicos del mapa mental --}}
    <style>
        /* Pega aquí TODO el <style> de tu mapa mental */
        :root{
            --bg: transparent; /* El fondo ya lo pone el layout */
            --line: #d7dbef;
            /* ...etc... */
        }
        .wrap { max-width: 100%; margin: 0; padding: 0; } /* Ajusta el wrap para que encaje bien */
        /* ... el resto de tu CSS ... */
    </style>

    <script>
        // Pega aquí TODO el <script> de tu mapa mental
        const root = document.getElementById('mindmap');
        // ... el resto de tu JS ...
    </script>

</x-1public>
<style>
  :root{
    --bg: #f6f7fb;
    --line: #d7dbef;
    --node-bg: #cfd8ff;          /* pastel tipo captura */
    --node-text: #1b1c22;
    --hover: #e9edff;
    --radius: 16px;
    --pad-v: .75rem;
    --pad-h: 1.25rem;
    --shadow: 0 1px 0 rgba(10,10,40,.04), 0 6px 18px rgba(30, 35, 90, .08);
    --font: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif;
  }
  html,body{height:100%}
  body{margin:0;background:var(--bg);font-family:var(--font);color:var(--node-text)}
  .wrap{max-width:1100px;margin:48px auto 80px;padding:0 20px}
  h1{margin:0 0 20px;text-align:center;font-weight:800;letter-spacing:.2px}
  .actions{display:flex;gap:.5rem;justify-content:center;margin:10px 0 28px;flex-wrap:wrap}
  .btn{border:1px solid #cfd6ff;background:white;padding:.6rem .9rem;border-radius:10px;cursor:pointer;box-shadow:var(--shadow);font-weight:600}
  .btn:hover{background:#fff;border-color:#b9c4ff}
  .btn:active{transform:translateY(1px)}
  .mindmap{position:relative;padding-left:18px}
  .branch{position:relative;margin-left:22px;border-left:2px solid var(--line)}
  .branch>.node{margin-left:-22px}
  .node::before{content:"";position:absolute;left:-22px;top:50%;width:22px;height:2px;background:var(--line);transform:translateY(-50%)}
  .node{position:relative;list-style:none;display:flex;align-items:center;justify-content:space-between;gap:12px;padding:var(--pad-v) var(--pad-h);background:var(--node-bg);border-radius:var(--radius);box-shadow:var(--shadow);border:1px solid #bcc7ff;cursor:pointer;user-select:none;transition:background .2s,border-color .2s,transform .06s;font-size:18px;line-height:1.25}
  .node:hover{background:var(--hover)}
  .node:active{transform:translateY(1px)}
  .node .label{flex:1 1 auto;font-weight:700;color:var(--node-text);text-wrap:balance}
  .node .chev{flex:0 0 auto;width:34px;height:34px;display:grid;place-items:center;border-radius:50%;border:1px solid #b7c2ff;background:#e3e8ff;font-weight:900;line-height:1}
  details[open]>summary .chev{transform:rotate(90deg)}
  summary::-webkit-details-marker{display:none}
  summary{list-style:none}
  .leaf{margin:10px 0 10px 24px;padding:.5rem .75rem;background:#eef1ff;border:1px dashed #c6cffd;border-radius:12px;font-size:16px}
  details{margin:14px 0}
  .branch details{margin:10px 0}
  .node:focus-visible{outline:3px solid #8aa2ff;outline-offset:3px}
</style>
</head>
<body>
<div class="wrap">
  <h1>🗺️ Gestor de Notas Online Laravel — Mapa Mental</h1>

  <div class="actions">
    <button class="btn" id="expandAll">Desplegar todo</button>
    <button class="btn" id="collapseAll">Colapsar todo</button>
    <button class="btn" id="goLast">Ir al último nodo</button>
  </div>

  <section class="mindmap" id="mindmap">
    <!-- Raíz -->
    <details open>
      <summary class="node">
        <span class="label">Gestor de Notas Online Laravel</span>
        <span class="chev">›</span>
      </summary>

      <div class="branch">
        <!-- MVP -->
        <details>
          <summary class="node"><span class="label">Descripción (MVP)</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">Aplicación Laravel para crear, leer, actualizar y eliminar notas personales por usuario.</p>
            <p class="leaf">Autenticación web con Breeze y API con Sanctum (tokens personales).</p>
            <p class="leaf">Búsqueda por título/contenido, etiquetado y filtros combinables.</p>
            <p class="leaf">API REST con paginación, ordenación y validación.</p>
          </div>
        </details>

        <!-- Funcionalidades -->
        <details>
          <summary class="node"><span class="label">Funcionalidades</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">CRUD de notas con ownership por usuario (User 1—N Note).</p>
            <p class="leaf">Etiquetas: creación/edición y filtro por múltiples tags.</p>
            <p class="leaf">Buscador: query libre (LIKE) sobre título y cuerpo.</p>
            <p class="leaf">Ordenación: created_at, updated_at, title (asc/desc).</p>
          </div>
        </details>

        <!-- Requisitos -->
        <details>
          <summary class="node"><span class="label">Requisitos</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">PHP 8.2+, Composer, Node 18+, Vite, DB (MySQL o SQLite).</p>
            <p class="leaf">Laravel 11, Breeze (sesión web) y Sanctum (API).</p>
            <p class="leaf">Extensiones: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON.</p>
          </div>
        </details>

        <!-- Instalación -->
        <details>
          <summary class="node"><span class="label">Instalación y Arranque (Local)</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">composer create-project laravel/laravel notas</p>
            <p class="leaf">cp .env.example .env &nbsp;→ configurar DB; php artisan key:generate</p>
            <p class="leaf">php artisan migrate &amp;&amp; php artisan serve</p>
            <p class="leaf">npm install &amp;&amp; npm run dev</p>
          </div>
        </details>

        <!-- Estructura relevante -->
        <details>
          <summary class="node"><span class="label">Estructura Relevante</span><span class="chev">›</span></summary>
          <div class="branch">
            <details>
              <summary class="node"><span class="label">app/</span><span class="chev">›</span></summary>
              <div class="branch">
                <p class="leaf">Http/Controllers/NoteController.php (Web)</p>
                <p class="leaf">Http/Controllers/Api/NoteController.php (API)</p>
                <p class="leaf">Http/Resources/NoteResource.php</p>
                <p class="leaf">Models/Note.php · Models/Tag.php</p>
                <p class="leaf">Policies/NotePolicy.php</p>
              </div>
            </details>
            <details>
              <summary class="node"><span class="label">routes/</span><span class="chev">›</span></summary>
              <div class="branch">
                <p class="leaf">web.php — resource('notes')->middleware('auth')</p>
                <p class="leaf">api.php — /api/notes protegido por auth:sanctum</p>
              </div>
            </details>
            <details>
              <summary class="node"><span class="label">resources/views/notes/</span><span class="chev">›</span></summary>
              <div class="branch">
                <p class="leaf">index.blade.php · create.blade.php · edit.blade.php · _filters.blade.php</p>
              </div>
            </details>
            <details>
              <summary class="node"><span class="label">database/migrations/</span><span class="chev">›</span></summary>
              <div class="branch">
                <p class="leaf">create_notes_table (title, body, user_id)</p>
                <p class="leaf">create_tags_table</p>
                <p class="leaf">create_note_tag_table (pivot)</p>
              </div>
            </details>
          </div>
        </details>

        <!-- Autorización -->
        <details>
          <summary class="node"><span class="label">Autorización (Policies)</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">NotePolicy: view/update/delete limitado al owner.</p>
            <p class="leaf">Policy registrada en AuthServiceProvider o auto-descubierta.</p>
            <p class="leaf">Middleware: auth para web; auth:sanctum para API.</p>
          </div>
        </details>

        <!-- Modelos & relaciones -->
        <details>
          <summary class="node"><span class="label">Modelos, Relaciones y Migraciones</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">User hasMany Note; Note belongsTo User.</p>
            <p class="leaf">Note belongsToMany Tag; Tag belongsToMany Note.</p>
            <p class="leaf">Campos recomendados: title (string), body (text), user_id, timestamps.</p>
          </div>
        </details>

        <!-- Rutas -->
        <details>
          <summary class="node"><span class="label">Rutas</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">Web: Route::resource('notes', NoteController::class)->middleware('auth')</p>
            <p class="leaf">API: Route::apiResource('notes', Api\NoteController::class)->middleware('auth:sanctum')</p>
            <p class="leaf">Tags: endpoints de listado/búsqueda opcionales.</p>
          </div>
        </details>

        <!-- Búsqueda, filtros, orden -->
        <details>
          <summary class="node"><span class="label">Búsqueda, Filtros y Ordenación</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">q: busca en title y body (LIKE %q%).</p>
            <p class="leaf">tags[]: filtra por intersección de etiquetas.</p>
            <p class="leaf">sort=created_at|updated_at|title &nbsp; dir=asc|desc.</p>
            <p class="leaf">Paginación: ?page=1&amp;per_page=10 (en API).</p>
          </div>
        </details>

        <!-- Ejemplos API -->
        <details>
          <summary class="node"><span class="label">Ejemplos cURL (API)</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">Login (token): POST /api/login → { email, password } → Bearer &lt;token&gt;</p>
            <p class="leaf">Listar: GET /api/notes?tags[]=work&amp;q=laravel&amp;sort=updated_at&amp;dir=desc</p>
            <p class="leaf">Crear: POST /api/notes { title, body, tags: ["work","ideas"] }</p>
            <p class="leaf">Actualizar: PUT /api/notes/{id} { title?, body?, tags? }</p>
            <p class="leaf">Eliminar: DELETE /api/notes/{id}</p>
          </div>
        </details>

        <!-- UI -->
        <details>
          <summary class="node"><span class="label">UI (Blade + Breeze)</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">Layout con navegación, flash messages y formulario de búsqueda.</p>
            <p class="leaf">Listados con badges de tags y acciones (ver/editar/borrar).</p>
            <p class="leaf">Form de nota con selector de etiquetas (creación rápida).</p>
          </div>
        </details>

        <!-- Tests -->
        <details>
          <summary class="node"><span class="label">Tests</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">Feature: un usuario crea/edita/borra sus notas; no ve las de otros.</p>
            <p class="leaf">API: respuestas JSON, validaciones y políticas respetadas.</p>
            <p class="leaf">Seeder/Factory para User, Note y Tag.</p>
          </div>
        </details>

        <!-- Demo / Producción -->
        <details>
          <summary class="node"><span class="label">Demo / Producción</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">Build Vite para assets; php artisan config:cache y route:cache.</p>
            <p class="leaf">Migraciones automáticas en release; storage link.</p>
            <p class="leaf">En entorno PaaS: variables .env seguras y APP_KEY configurada.</p>
          </div>
        </details>

        <!-- FAQ -->
        <details>
          <summary class="node"><span class="label">Solución de Problemas (FAQ)</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">“Failed to open stream vendor/autoload.php” → ejecutar composer install.</p>
            <p class="leaf">Errores de migración → revisar conexión DB, permisos y nombres de tablas.</p>
            <p class="leaf">Token inválido → comprobar header Authorization: Bearer &lt;token&gt; y expiry.</p>
          </div>
        </details>

        <!-- Roadmap -->
        <details>
          <summary class="node"><span class="label">Roadmap (Ideas)</span><span class="chev">›</span></summary>
          <div class="branch">
            <p class="leaf">Compartir notas por enlace o por usuarios.</p>
            <p class="leaf">Adjuntos, editor markdown y versiones de nota.</p>
            <p class="leaf">Búsqueda avanzada (Scout/Meilisearch) y archivado.</p>
            <p class="leaf">Exportar/Importar (JSON/Markdown).</p>
          </div>
        </details>

      </div>
    </details>
  </section>
</div>

<script>
  const root = document.getElementById('mindmap');
  const allDetails = () => Array.from(root.querySelectorAll('details'));
  const closeSiblings = (el) => {
    const parent = el.parentElement;
    if(!parent) return;
    [...parent.children].forEach(ch=>{
      if(ch.tagName === 'DETAILS' && ch !== el){ ch.open = false; }
    });
  };
  root.addEventListener('toggle', (e)=>{
    const d = e.target;
    if(d.tagName !== 'DETAILS') return;
    if(d.open){ closeSiblings(d); }
  });
  document.getElementById('expandAll').addEventListener('click', ()=>{
    allDetails().forEach(d => d.open = true);
  });
  document.getElementById('collapseAll').addEventListener('click', ()=>{
    const list = allDetails();
    list.forEach((d,i)=> d.open = (i === 0)); // deja raíz abierta
    root.querySelector('details').scrollIntoView({behavior:'smooth', block:'start'});
  });
  document.getElementById('goLast').addEventListener('click', ()=>{
    const lastLeaf = root.querySelector('p.leaf:last-of-type');
    if(!lastLeaf) return;
    let el = lastLeaf;
    while(el && el !== document){
      if(el.tagName === 'DETAILS'){ el.open = true; }
      el = el.parentElement;
    }
    lastLeaf.scrollIntoView({behavior:'smooth', block:'center'});
    lastLeaf.animate(
      [{boxShadow:'0 0 0 0 rgba(0,0,0,0)'},{boxShadow:'0 0 0 6px rgba(154,169,255,.6)'},{boxShadow:'0 0 0 0 rgba(0,0,0,0)'}],
      {duration:1200, easing:'ease-out'}
    );
  });
</script>
</body>
</html>
