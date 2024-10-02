<nav>
    <a>Logo</a>
    <div>
        <button>
            <svg></svg>
            <span>Empieza tu Busqueda</span>
        </button>
    </div>
    @guest
    <a href="/login" >Inicia sesion</a>
    @endguest
    @auth
        <form action="/logout" method="POST" >
            @csrf
            <button type="submit" >Cerrar Sesion</button>
        </form>
    @endauth
</nav>
